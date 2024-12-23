<template>
    <AdminAuthenticatedLayout>
        <div class="min-h-screen bg-wheat">
    
        <!-- Main Content -->
        <div class="container">
            <h1 class="text-2xl font-bold text-center mb-4">Reservations</h1>
    
            <!-- Loading State -->
            <div v-if="loading" class="text-center">
            <p>Loading reservations...</p>
            </div>
    
            <!-- Reservations Table -->
            <div v-else>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                <tr class="bg-white">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">User ID</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Phone</th>
                    <th class="border border-gray-300 px-4 py-2">Date</th>
                    <th class="border border-gray-300 px-4 py-2">Guests</th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white" v-for="reservation in reservations" :key="reservation.id">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ reservation.id }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ reservation.user_id }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ reservation.Name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ reservation.No_Telp }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ reservation.Reservation_Date }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ reservation.Number_Of_Guest }}</td>
                </tr>
                </tbody>
            </table>
    
            <!-- No Data Message -->
            <p v-if="reservations.length === 0" class="text-center mt-4">
                No reservations found.
            </p>
            </div>
        </div>
        </div>
    </AdminAuthenticatedLayout>
  </template>
  
  <script setup>
    import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
    import { ref, onMounted } from "vue";
    import axios from "axios";
    
    // State Variables
    const reservations = ref([]);
    const loading = ref(true);
    
    // Fetch Reservations Data
    const fetchReservations = async () => {
      try {
        const response = await axios.get("/api/reservations");
        console.log(response.data);  // Log the data to inspect it
        reservations.value = response.data;
      } catch (error) {
        console.error("Error fetching reservations:", error);
      } finally {
        loading.value = false;
      }
    };

  
    // Fetch data when the component is mounted
    onMounted(() => {
      fetchReservations();
    });
  </script>
  
  <style scoped>
  .container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .table-auto {
    width: 100%;
    border-collapse: collapse;
  }
  
  th, td {
    padding: 10px;
    border: 1px solid #ccc;
  }
  
  th {
    background-color: #f2f2f2;
  }

  .bg-wheat{
    background-color: wheat;
  }
  </style>
  