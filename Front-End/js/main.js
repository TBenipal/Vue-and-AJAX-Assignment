console.log("APP STARTED");
const app = Vue.createApp({
    data() {
        return {
            electricCars: [],
            petrolCars: [],
            selectedCar: '',
            electricUrl: "http://127.0.0.1:8000/api/electric-cars",
            petrolUrl: "http://127.0.0.1:8000/api/petrol-cars"
        };
    },
    methods: {
        fetchCar() {
            fetch(this.electricUrl)
            .then(response => response.json())
            .then(data => { 
                this.electricCars = data; 
            })
            .catch(error => {
                console.error(error);
            });

            fetch(this.petrolUrl)
            .then(response => response.json())
            .then(data => { 
                this.petrolCars = data; 
            })
            .catch(error => {
                console.error(error);
            });
        },

        ElectricDetails(id) {
            fetch(`${this.electricUrl}/${id}`)
            .then(response => response.json())
            .then(data => { 
                this.selectedCar = data; 
            })
            .catch(error => {
                console.error(error);
            });
        },

        PetrolDetails(id) {
            fetch(`${this.petrolUrl}/${id}`)
            .then(response => response.json())
            .then(data => { 
                this.selectedCar = data; 
            })
            .catch(error => {
                console.error(error);
            });
        }
    },

    mounted() {
        this.fetchCar();
    }

}).mount("#app");