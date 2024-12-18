<template>
  <div class="container">
    <h1 class="text-2xl font-bold text-center mb-4">Reservation Page</h1>
    <p class="text-center mb-4">Please fill in the details to make a reservation.</p>

    <form @submit.prevent="submitReservation" class="max-w-lg mx-auto">
      <!-- Name -->
      <div class="form-group mb-4">
        <label for="name" class="block text-left font-medium">Name</label>
        <input
          type="text"
          id="name"
          class="form-control"
          v-model="reservation.name"
          required
          placeholder="Enter your name"
        />
      </div>

      <!-- Phone Number -->
      <div class="form-group mb-4">
        <label for="phone" class="block text-left font-medium">Phone Number</label>
        <input
          type="text"
          id="phone"
          class="form-control"
          v-model="reservation.phone"
          required
          placeholder="Enter your phone number"
        />
      </div>

      <!-- Number of Guests -->
      <div class="form-group mb-4">
        <label for="guests" class="block text-left font-medium">Number of Guests</label>
        <input
          type="number"
          id="guests"
          class="form-control"
          v-model="reservation.guests"
          min="1"
          max="12"
          required
          placeholder="Enter number of guests"
        />
      </div>

      <!-- Reservation Date -->
      <div class="form-group mb-4">
        <label for="date" class="block text-left font-medium">Reservation Date</label>
        <input
          type="date"
          id="date"
          class="form-control"
          v-model="reservation.date"
          required
        />
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button
          type="submit"
          class="btn btn-primary px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600"
        >
          Reserve Now
        </button>
      </div>
    </form>

    <!-- Success Message -->
    <div v-if="message" class="alert alert-success mt-4 text-center">
      {{ message }}
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

// Reservation data and success message
const reservation = ref({
  name: '',
  phone: '',
  guests: 1,
  date: '',
});

const message = ref('');

// Submit reservation data
const submitReservation = async () => {
  try {
    const response = await axios.post('/api/reservations', {
      Name: reservation.value.name,
      No_Telp: reservation.value.phone,
      Reservation_Date: reservation.value.date,
      Number_Of_Guest: reservation.value.guests,
      user_id: 1, // Static for now, replace with actual user ID from authentication
    });

    // Show success message
    message.value = 'Reservation added successfully!';
    console.log('Response:', response.data);

    resetForm();
  } catch (error) {
    console.error('Error adding reservation:', error.response?.data || error);
    message.value = 'Failed to add reservation. Please try again.';
  }
};

// Reset form after submission
const resetForm = () => {
  reservation.value = {
    name: '',
    phone: '',
    guests: 1,
    date: '',
  };
};
</script>

<style scoped>
.container {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
  text-align: left;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 1rem;
}

input.form-control {
  width: 100%;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
}

button.btn {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

button.btn:hover {
  background-color: #0056b3;
}

.alert {
  padding: 15px;
  margin-top: 20px;
  background-color: #d4edda;
  color: #155724;
  border-radius: 5px;
}
</style>
