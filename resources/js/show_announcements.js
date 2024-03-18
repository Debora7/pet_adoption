import axios from 'axios';

export default {
    data() {
        return {
        announcements: [],
        errorMessage: '',
        errors: {}
    };
    },
    created() {
        this.fetchAnnouncements();
    },
    methods: {
        fetchAnnouncements() {
            axios.get('/show-announcements')
                .then(response => {
                    this.announcements = response.data.announcements;
                    this.announcements.forEach(announcement => {
                        announcement.image_path = JSON.parse(announcement.image_path)[0];
                    });
                    console.log(this.announcements);
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