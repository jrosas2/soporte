<section class="site-section bg-light" id="contacto" data-aos="fade">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">Contacto</h2>
            </div>
        </div>
        <div class="row mb-5"> 



            <div class="col-md-6 text-center">
                <p class="mb-4">
                    <span class="icon-room d-block h4 text-primary"></span>
                    <span>Avenal 1846, Conchalí, Chile</span>
                </p>
            </div>
            <div class="col-md-6 text-center">
                <p class="mb-4">
                    <span class="icon-phone d-block h4 text-primary"></span>
                    <a href="tel:+56945365729">+569 45365729</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">


                {{-- variables disponible en todas las VISTAS para validar errores --}}
                {{-- {{ $errors }} --}}
                {{-- {{ var_dump($errors->any()) }} --}}



                <form method="POST" action="{{ route('messages.store') }}" class="send_message_form p-5 bg-white">
                    @csrf

                    <h2 class="h4 text-black mb-5">Formulario de contacto</h2>

                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Nombre</label>
                            <input type="text" id="fname" name="fname" class="form-control" value="{{ old('fname') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Apellido</label>
                            <input type="text" id="lname" name="lname" class="form-control" value="{{ old('lname') }}">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject" >Asunto</label>
                            <input type="subject" id="subject" name="subject" class="form-control" placeholder="Cotización" value="{{ old('subject') }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Mensaje</label>
                            <textarea name="message" id="message" name="message" cols="30" rows="7" class="form-control" placeholder="Escribe tu mensaje aquí..." {{-- value="{{ old('content') }}" --}}></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <button type="submit" id="enviar" class="submit_message btn btn-primary btn-md text-white">Enviar</button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>
</section>