<?php

namespace App\Http\Controllers;

use App\Mail\MessageClient;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

// use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store()
    {


    	// validaciones de los formularios del correo
    	
    	// $msg = request()->validate([
    	$msg = request()->validate([
    		'fname' => 'required',
    		'lname' => 'required',
    		'email' => 'required|email',
    		'subject' => 'required',
    		'message' => 'required'
    	]);
    	// // usar despues del array y serparar por comas en caso de necesitar cambiar el mensaje de error desde el lado del servidor
    	// // ['name.required' => 'necesito tu nombre'
    	// // ]);

    	// para enviar email importar primero la clase Mail (facade) usamos en metodo send o queue y pasalmos como una nueva instancia MessageReceived e importamos la instancia
    	// Mail::to('juan.rosas17@gmail.com')->queue(new MessageReceived($msg));

    	Mail::to('juan.rosas.andrade@gmail.com')->queue(new MessageReceived($msg));
    	Mail::to(request()->email)->queue(new MessageClient($msg));

    	// para ver en el navegador directamente retornando una nueva instancia de la clase MessageReceived

    	// return new MessageReceived($msg);

    	return response()->json('email enviado', 200);



    	// en el metodo store(Request $request), Usar para validar los datos enviados en formato json
    	// usar el metodo ->get ('nombre del campo') para obtener solo los datos de ese campo
    	// return $request; 

    	// otra forma de acceder a la información es pasar la función request que devuelve una instancia de la clase Illuminate y se le pasa como parametro el nombre del campo a consultar se debe dejar el metodo Store (vacio) y quitar la clase Illuminate
    	// return request('email'); 



    }
}
