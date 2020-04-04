<template>
  <div class="col-md-12 d-flex justify-content-center">
    <form action="#" method="post" id="form">
      <div class="container">
        <div class="row">
          <div class="border d-flex justify-content-center">
            <div class="panel panel-default col-md-8">
              <div class="panel-body">
                <form role="form">
                   <label for="price">what you want thank you!</label>
                  <input type="text" 
                          class="form-control"
                          id="price"
                          placeholder="Enter your price"
                          required
                          autofocus
                          value="$"
                          />
                         
                  <div class="form-group">
                    <label for="cardNumber"> CARD NUMBER</label>
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control"
                        id="cardNumber"
                        placeholder="Valid Card Number"
                        required
                        autofocus
                      />
                      <span class="input-group-addon"
                        ><span class="glyphicon glyphicon-lock"></span
                      ></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-7 col-md-7">
                      <div class="form-group">
                        <label for="expityMonth"> EXPIRY DATE</label>
                        <div class="col-xs-6 col-lg-6 pl-ziro">
                          <input
                            type="text"
                            class="form-control"
                            id="expityMonth"
                            placeholder="MM"
                            required
                          />
                        </div>
                        <div class="col-xs-6 col-lg-6 pl-ziro">
                          <input
                            type="text"
                            class="form-control"
                            id="expityYear"
                            placeholder="YY"
                            required
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-5 col-md-5 pull-right">
                      <div class="form-group">
                        <label for="cvCode"> CV CODE</label>
                        <input
                          type="password"
                          class="form-control"
                          id="cvCode"
                          placeholder="CV"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <button
                    type="submit"
                    href="#"
                    class="btn btn-success btn-lg btn-block"
                    id="btnsumbit"
                    value="Pay"
                    >Pay</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>

//  import Card from './components/Card'
// export default {

//   el:'#card',
//   components: {
    
//     Card
//   },
//    template: '<div class="card bg-dark text-white"><img class="card-img" src="..." alt="Card image"><div class="card-img-overlay"><h5 class="card-title">Card title</h5><p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p><p class="card-text">Last updated 3 mins ago</p></div></div>'
// }
// let stripe = Stripe(`pk_test_cveopxQHO6zY0MkHmtnOUcX700qOCC5IgP`),
//   elements = stripe.elements(),
//   card = undefined;

// export default {
// mounted: function () {
//   card = elements.create('card');
//   card.mount(this.$refs.card);
// },

// purchase: function () {

//   let self = this;

//     stripe.createToken(card).then(function(result) {
//       // Access the token with result.token
//       if (result.error) {
//       self.hasCardErrors = true;
//       self.$forceUpdate(); // Forcing the DOM to update so the Stripe Element can update.
//       return;
//     }

//   });
// }

</script>

<style>

</style>
