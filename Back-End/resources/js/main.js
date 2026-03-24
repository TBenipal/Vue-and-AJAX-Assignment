import { createApp } from 'vue';

console.log("JS FILE LOADED");
const app = createApp({
    data() {
        return {
            electricCars: [],
            petrolCars: [],
            selectedCar: null,
            electricUrl: "http://127.0.0.1:8000/api/electric-cars",
            petrolUrl: "http://127.0.0.1:8000/api/petrol-cars"
        };
    },
    methods: {
        fetchCar() {
            console.log("FETCH RUNNING");
            fetch(this.electricUrl)
                .then(res => res.json())
                .then(data => { this.electricCars = data; })
                .catch(err => console.error("Electric Load Error", err));

            fetch(this.petrolUrl)
                .then(res => res.json())
                .then(data => { this.petrolCars = data; })
                .catch(err => console.error("Petrol Load Error", err));
        },
        getElectricDetails(id) {
            if (!id) return; // Prevent undefined requests
            fetch(`${this.electricUrl}/${id}`)
                .then(res => res.json())
                .then(data => { this.selectedCar = data; })
                .catch(err => console.error("Electric Detail Error", err));
        },
        getPetrolDetails(id) {
            if (!id) return; // Prevent undefined requests
            fetch(`${this.petrolUrl}/${id}`)
                .then(res => res.json())
                .then(data => { this.selectedCar = data; })
                .catch(err => console.error("Petrol Detail Error", err));
        }
    },
    mounted() {
        // Only fetch the car lists once
        this.fetchCar();
    }
}).mount("#app");