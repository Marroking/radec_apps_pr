<?php

class FilesController extends Controller {

	public function getListarfiles()
	{
		$idUser =  Auth::user()->id;

		$model = new File;

		$files = $model->where('user_id', '=', $idUser)->where('estado', '=', 0)->get();
		var_dump($files);
		//return View::make('files.list', array('files'=>$files));

	}

	public function content()
	{
		return View::make('files.content');
	}
	public function postReplaceFiles($id_archivo)
		{

			$idUser = Auth::user()->id;
			$fileViejo = File::find($id_archivo);
			$user = User::find($idUser);

			$file = Input::file('file');

			$destino_path = public_path().'/uploads/'.$idUser.'/';

				$fileRegistro = new File;
				$fileRegistro->nameEncryption = sha1($file->getClientOriginalName());
				$fileRegistro->normalName = $file->getClientOriginalName();
				$fileRegistro->state = 0;
				$fileRegistro->path_file = $destino_path.$file->getClientOriginalName();
				$fileRegistro->type = $file->guessExtension();
				$fileRegistro->size = $file->getClientSize();
				$fileRegistro->ClientOriginalName = $file->getClientOriginalName();
				$fileRegistro->ClientOriginalExtension = $file->getClientOriginalExtension();
				$fileRegistro->mimeType = $file->getMimeType();
				$fileRegistro->realPath = $file->getRealPath();

			if ($file->move($destino_path, $file->getClientOriginalName()))
			 {
			 		if (unlink($fileViejo->ruta))
			 		{
			 			$fileRegistro->user()->associate($user);
			 			$fileRegistro->save();

			 			if ($fileViejo->delete())
			 				return Redirecto::to('files/list');
			 			else
			 					echo "El archivo se ha eliminado de la base de datos";
			 		}
			 		else
			 			echo "El archivo no se ha borrado";
			 	}
			 	else 
			 		echo "No se han guardado los cambios";
		}

	public function getSimple()
		{
			return View::make('files.simple')->with('estado', false);
		}

	public function postSimple()
		{
			$file = Input::file('file');
			//$url_image = Hash::make($file->getClientOriginalName());
			$url_image = $file->getClientOriginalName();
			$destino_path = public_path().'/uploads/';
			$subir = $file ->move($destino_path, $url_image.'.'.$file->guessExtension());
			return View::make('files.simple')->with('estado', true);
		}
}