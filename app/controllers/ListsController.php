<?php

class ListsController extends Controller {

	public function postReplaceFiles($id){
		$idUser = Auth::user()->id;
		$fileOld = File::find($id_archivo);
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
		 		if (unlink($fileOld->ruta))
		 		{
		 			$fileRegistro->user()->associate($user);
		 			$fileRegistro->save();

		 			if ($fileOld->delete())
		 				return Redirecto::to('lists/index');
		 			else
		 					echo "El archivo se ha eliminado de la base de datos";
		 		}
		 		else
		 			echo "El archivo no se ha borrado";
		 	}
		 	else 
		 		echo "No se han guardado los cambios";
	}

}