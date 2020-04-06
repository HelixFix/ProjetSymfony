<template>
  <div class="hello">
    <form id="form" method="post" action="/test">
      <input type="text" name="form" />

      <input type="submit" />
    </form>

    <h1>{{ msg }}</h1>
  </div>
</template>

<script>
export default {
  name: "Shop",
  data() {
    return {
      msg: "Welcome to Your Vue.js App"
    };
  },
  // define methods under the `methods` object
  methods: {
    onSubmit: function(event) {
      const formData = new FormData(document.getElementById("form"))
      fetch("/test", {
        method: "post",
        body: formData
      });
    },
    
  }
};
</script>