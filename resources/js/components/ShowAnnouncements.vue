<template>
    <div class="row mt-4">
        <div class="col-md-4 mb-4" v-for="announcement in announcements" :key="announcement.id">
            <div class="card" style="width: 18rem; height: 100%;">

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div v-for="(image, index) in announcement.images" :key="index" :class="['carousel-item', { 'active': index === 0 }]">
                            <img :src="'/storage/' + image" alt="Uploaded Image" class="d-block" style="width: 100%; height: 300px; object-fit: cover;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" :data-bs-target="'#carousel_' + announcement.id" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" :data-bs-target="'#carousel_' + announcement.id" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ announcement.animal }}</h5>
                    <p class="badge bg-success p-2">{{ announcement.phone_number }}</p>
                    <p class="lead" v-if="announcement.description">{{ announcement.description }}</p>
                    <p class="card-text" v-if="announcement.price">
                        <span class="badge bg-primary p-2 me-2">Price: </span>
                        <span class="text-primary">{{ announcement.price }} Lei</span>
                    </p>
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