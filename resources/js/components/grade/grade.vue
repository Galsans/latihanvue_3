<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-group">
                        <h5>Kelas :</h5>
                        <p>{{ grade.kelas }}</p>
                    </div>
                    <div class="card-group">
                        <h5>WaliKelas :</h5>
                        <p>{{ grade.walikelas }}</p>
                    </div>
                    <div class="card-group">
                        <router-link
                            :to="`/grades/${grade.id}/edit`"
                            class="btn btn-secondary mt-2"
                            >Edit</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            grade: {},
        };
    },
    async created() {
        try {
            const response = await axios.get(
                `/api/grades/${this.$route.params.id}`
            );
            this.grade = response.data;
        } catch (error) {
            console.error(error);
        }
    },
};
</script>
