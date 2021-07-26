        <!-- Login Modal -->

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="/client/auth">
                  {{ csrf_field() }}
                    <div class="form_inputs">
                      <div class="form-group">
                        <label for="email_log" class="col-form-label">Email:</label>
                        <input type="text" name="email" class="form-control" id="email_log" value="" required>
                      </div>
                      <div class="form-group">
                        <label for="pass" class="col-form-label">Password:</label>
                        <input type="password" name="password" class="form-control" value="" id="pass" required>
                      </div>
                    </div>
                    <p></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success login" >Login</button>
                </div>
                </form>
              </div>
            </div>
          </div>

         <!-- Register Modal -->
          <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" >Register</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="client/add">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <label for="first" class="col-form-label">Firstname</label>
                      <input type="text" class="form-control first" name="first"  id="first" required>
                    </div>
                    <div class="form-group">
                      <label for="last" class="col-form-label">Lastname</label>
                      <input type="text" class="form-control" name="last"  id="last" required>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-form-label">Email</label>
                      <input type="text" class="form-control" name="email"  id="email" required>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-form-label">Password</label>
                      <input type="password" class="form-control" name="password"  id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse" class="col-form-label">Adresse</label>
                        <textarea class="form-control" name="adress" id="adresse" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tel" class="col-form-label">Phone number</label>
                        <input type="text" class="form-control" name="phone"  id="tel" required>
                    </div>
                  
                  <p class="mt-4 text-success register_msg"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success register">Register</button>
                 
                </div>
                </form>
              </div>
            </div>
          </div>
        


        <!-- Cart Modal -->

        <div class="modal fade bd-example-modal-lg p-4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content shop_card">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Card<span class="badge badge-primary badge-pill ml-2">2</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantity</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
                        <tfoot>
                        <tr class="border-0">
                        <th scope="col">Prix total</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col" class="total"></th>
                        </tr> 
                        </tfoot>
                    </table>
                    <p class="py-5 text-center font-weight-bold empty">Your card is empty!</p>
                   
                    <div class="modal-footer d-flex justify-content-between">
                       <p class='checkout_msg'></p>
                        <div>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-success valider" onclick="checkout();">Valider</button>
                        </div>
                       
                    </div>
                </div>

            </div>
        </div>



    </div>
