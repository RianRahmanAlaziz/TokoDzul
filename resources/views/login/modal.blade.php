<div class="modal fade" id="exampleModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                  <div class="forms-modal login">
                    <h1 class="h3 fw-normal text-center">Login</h1>
                    <form action="/login" method="POST">
                      @csrf
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
                        <i class='bx bx-hide eye-icon s'></i>
                      </div>
    
                      <div class="field-modal  button-field">
                      <button  type="submit">Login</button>
                      </div>
                    </form>
                    <p class="d-block text-center mt-20">
                      Not Registered? <a href="#" data-toggle="modal" data-target="#daftar" data-dismiss="modal" aria-label="Close">Register Now!</a>
                    </p>
                  </div>
                  </main>
                </div>
            </div>
            
        </div>
    </div>
</div>

