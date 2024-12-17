<template>
    <div class="container">
      <h2 class="text-center">Reservation Form</h2>
      <form @submit.prevent="submitReservation">
        <!-- Name -->
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            id="name"
            class="form-control"
            v-model="reservation.name"
            required
          />
        </div>
  
        <!-- Phone Number -->
        <div class="form-group">
            <label for="guests">Number of Guests</label>
            <input
                type="number"
                id="guests"
                class="form-control"
                v-model="reservation.guests"
                min="1"
                max="12" <!-- Membatasi maksimal 12 tamu -->
                required
            />
        </div>

  
        <!-- Reservation Date -->
        <div class="form-group">
          <label for="date">Reservation Date</label>
          <input
            type="date"
            id="date"
            class="form-control"
            v-model="reservation.date"
            required
          />
        </div>
  
        <!-- Number of Guests -->
        <div class="form-group">
          <label for="guests">Number of Guests</label>
          <input
            type="number"
            id="guests"
            class="form-control"
            v-model="reservation.guests"
            min="1"
            required
          />
        </div>
  
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Reserve</button>
      </form>
  
      <!-- Success Message -->
      <div v-if="message" class="alert alert-success mt-3">
        {{ message }}
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    name: "ReservationForm",
    data() {
      return {
        reservation: {
          name: "",
          phone: "",
          date: "",
          guests: 1,
        },
        message: "",
      };
    },
    methods: {
      submitReservation() {
        axios
          .post("/api/reserve", {
            Name: this.reservation.name,
            No_Telp: this.reservation.phone,
            Reservation_Date: this.reservation.date,
            Number_Of_Guest: this.reservation.guests,
            user_id: 1, // Gantilah dengan ID user yang benar dari sistem autentikasi Anda
          })
          .then((response) => {
            this.message = "Reservation submitted successfully!";
            this.resetForm();
          })
          .catch((error) => {
            console.error("Error submitting reservation:", error);
            this.message = "Failed to submit reservation. Please try again.";
          });
      },
      resetForm() {
        this.reservation = {
          name: "",
          phone: "",
          date: "",
          guests: 1,
        };
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  h2 {
    margin-bottom: 20px;
  }
  </style>
  