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
                            <input class="form-control" type="text" id="animal" name="animal" v-model="animal">
                        </div>
                        <p v-if="errors.animal" class="text-danger">{{ errors.animal[0] }}</p>
                        <br>

                        <label for="image" class="form-label">Upload image(s)</label>
                        <div class="input-group mb-3">
                            <input class="form-control" ref="images" type="file" id="images" name="files[]" multiple>
                        </div>
                        <p v-if="errors.image" class="text-danger">{{ errors.image[0] }}</p>
                        <br>

                        <label for="price" class="form-label">What price it is?</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" id="price" name="price" v-model="price">
                        </div>

                        <label for="phone_number" class="form-label">Phone number:</label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="tel" id="phone_number" name="phone_number" v-model="phone_number">
                        </div>
                        <p v-if="errors.phone_number" class="text-danger">{{ errors.phone_number[0] }}</p>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <show-announcements></show-announcements>
</template>

<script>
    import add_announce_button from '../add_announce_button.js';

    export default {
        ...add_announce_button
    }
</script>