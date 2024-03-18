<template>
    <div class="row mt-4">
        <div class="col-md-4 mb-4" v-for="announcement in announcements" :key="announcement.id">
            <div class="card" style="width: 18rem; height: 500px;">
                <img :src="'/storage/' + announcement.image_path" alt="Uploaded Image" class="card-img-top img-thumbnail" style="width: 100%; height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ announcement.animal }}</h5>
                    <p class="card-text fw-light">{{ announcement.phone_number }}</p>
                    <p class="card-text" v-if="announcement.price">{{ announcement.price }} Lei</p>
                    <a href="#" class="btn btn-primary">Open</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   import show_announcements from '../show_announcements.js';

    export default {
        ...show_announcements
    }
</script>