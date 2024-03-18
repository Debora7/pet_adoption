import axios from 'axios';

    export default {
        data() {
            return {
                price: '',
                animal: '',
                phone_number: '',
                successMessage: '',
                errorMessage: '',
                errors: {},
            };
        },
        methods: {
            submitForm() {
                const formData = new FormData();

                formData.append('animal', this.animal);
                const filesInput = this.$refs.images.files;
                for (let i = 0; i < filesInput.length; i++) {
                    formData.append('image[]', filesInput[i]);
                }
                formData.append('price', this.price);
                formData.append('phone_number', this.phone_number);

                axios.post('/add-announce', formData)
                    .then(response => {
                        this.successMessage = response.data.message;

                        this.$emit('submitSuccess');

                        const modal = new bootstrap.Modal(this.$refs.modal);
                        modal.hide();
                    })
                    .catch(error => {
                        if (error.response && error.response.data && error.response.data.message) {
                            this.errorMessage = error.response.data.message;
                            this.errors = error.response.data.errors;
                        } else {
                            this.errorMessage = 'An error occurred. Please try again later.';
                        }

                        this.$emit('submitError');
                    });
            }
        }
    }