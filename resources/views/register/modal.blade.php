<div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
                    <form action="/register" method="POST">
                      @csrf
                      <div class="field-modal input-field">
                        <input type="name" name="name" class="input @error('name') is-invalid @enderror" id="name" placeholder="Name" autofocus required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="field-modal input-field">
                        <input type="username" name="username" class="input @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="field-modal input-field">
                        <input type="email" name="email" class="input @error('email') is-invalid @enderror" id="email" placeholder="Email" autofocus required value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="field-modal input-field">
                        <input type="password" name="password" class="password"  id="password" placeholder="Password">
                        <i class='bx bx-hide eye-icon d'></i>
                      </div>

                      <div class="field-modal  button-field">
                        <button  type="submit">Register</button>
                        </div>
                    </form>

                  </main>
                </div>
            </div>
            
        </div>
    </div>
</div>