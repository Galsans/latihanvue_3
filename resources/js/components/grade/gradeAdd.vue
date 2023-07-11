<template>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <div class="form-group">
                            <label for="">Kelas:</label>
                            <input
                                type="text"
                                id="kelas"
                                class="form-control"
                                v-model="grade.kelas"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="">WaliKelas:</label>
                            <input
                                type="text"
                                id="walikelas"
                                class="form-control"
                                v-model="grade.walikelas"
                                required
                            />
                        </div>
                        <div class="btn-group">
                            <button
                                type="submit"
                                class="btn btn-primary"
                                v-if="isNewKelas"
                            >
                                SAVE
                            </button>
                            <button
                                type="submit"
                                class="btn btn-secondary"
                                v-else
                            >
                                UPDATE
                            </button>
                        </div>
                    </form>
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
            grade: {
                kelas: "",
                walikelas: "",
            },
        };
    },
    computed: {
        isNewKelas() {
            return !this.$route.path.includes("edit");
        },
    },
    async created() {
        try {
            if (!this.isNewKelas) {
                const response = await axios.get(
                    `/api/grades/${this.$route.params.id}`
                );
                this.grade = response.data;
            }
        } catch (error) {
            console.error(error);
        }
    },
    methods: {
        async submitForm() {
            try {
                if (this.isNewKelas) {
                    await axios.post("/api/grades", this.grade);
                } else {
                    await axios.put(
                        `/api/grades/${this.$route.params.id}`,
                        this.grade
                    );
                }
                this.$router.push("/grades");
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
