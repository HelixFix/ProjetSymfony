<template>
  <div class="col-md-12 d-flex justify-content-center">
    <Card></Card>
    <form action="#" method="post">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <form role="form">
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
                  <a
                    href="#"
                    class="btn btn-success btn-lg btn-block"
                    role="button"
                    >Pay</a
                  >
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
export default {
  data: () => ({
    counter: 0,
  }),
};
</script>

<style></style>
