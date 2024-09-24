<template>
  <div class="user-form">
    <h2>Connecter Vous</h2>

    <form @submit.prevent="submitForm">
      <div>
        <label for="email">Email :</label>
        <input type="email" v-model="user.email" id="email" required />
      </div>

      <div>
        <label for="password">Mot de passe :</label>
        <input type="password" v-model="user.password" id="password" required />
      </div>

      <div v-if="errorMessage" class="error">
        {{ errorMessage }}
      </div>

      <button type="submit">Connecter Vous</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import { useToast } from 'vue-toastification';

export default {
  data() {
    return {
      user: {
        email: '',
        password: '',
        token:''
      },
      errorMessage: ''
    };
  },
  setup() {
    const toast = useToast();
    return { toast };
  },
  //emit
  methods: {
    submitForm() {
      this.errorMessage = '';

      this.dataToSend = {
        ...this.user,
      };

      axios
          .post('http://127.0.0.1:8000/api/login', this.dataToSend)
          .then((response) => {
            this.toast.success('Bienvenue parmi nous !');
            this.token = response.data.token;
            localStorage.setItem('token', response.data.token);
            console.log(this.token);
            this.$router.push('/userhomeview');
            this.resetForm();
            console.log(response);
          })
          .catch((error) => {
            console.error('Erreur lors de l\'authentification de l\'utilisateur:', error);
            if (error.response && error.response.data) {
              console.log('Détails de l\'erreur:', error.response.data);
              this.errorMessage = error.response.data.message || 'Une erreur est survenue.';
              this.toast.error(this.errorMessage);
            } else {
              this.errorMessage = 'Une erreur inconnue est survenue.';
              this.toast.error(this.errorMessage);
            }
          });
    },
    resetForm() {
      this.user = {
        email: '',
        password: ''
      };
    }
  }
};
</script>

<style scoped>
form{
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
form>div{
  width: 49%;
}
h2{
  text-align: center;
  margin-bottom: 40px;
}
.user-form {
  max-width: 600px;
  margin: 0 auto;
}

form div {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  color:#000000;
}

input, select, button {
  width: 100%;
  padding: 10px;
  border: 1px solid #000;
  border-radius: 4px;
}

.error {
  color: red;
  margin-top: 10px;
}

button {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
</style>
