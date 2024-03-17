<template>
    <div class="container">
        <div class="row justify-content-center">
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#add-announcement-modal">Add announcement</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-announcement-modal" ref="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="submitForm">
                    <div class="modal-body">
                        <label for="animal" class="form-label">What pet it is?</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" id="animal" name="animal" required v-model="animal">
                        </div>

                        <label for="image" class="form-label">Upload image(s)</label>
                        <div class="input-group mb-3">
                            <input class="form-control" ref="images" type="file" id="images" name="files[]" multiple required>
                        </div>

                        <label for="price" class="form-label">What price it is?</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" id="price" name="price" required v-model="price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                price: '',
                animal: '',
                successMessage: '',
                errorMessage: '',
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
                        } else {
                            this.errorMessage = 'An error occurred. Please try again later.';
                        }

                        this.$emit('submitError');
                    });
            }
        }
    }
</script>
