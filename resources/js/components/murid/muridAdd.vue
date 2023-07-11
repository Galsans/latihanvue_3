<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <form @submit="submitForm">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input
                                type="text"
                                id="nama"
                                class="form-control"
                                v-model="murid.nama"
                            />
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select
                                name=""
                                id="grade_id"
                                v-model="grade.kelas"
                                class="form-control"
                            >
                                <option
                                    v-for="grade in grades"
                                    :key="grade.id"
                                    :value="grade.id"
                                >
                                    {{ grade.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button
                                type="submit"
                                class="btn btn-primary"
                                v-if="isNewMurid"
                            >
                                SEND
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
            murid: {
                nama: "",
                grade_id: "",
            },
            grade: "",
            grades: [],
        };
    },
    computed: {
        isNewMurid() {
            return !this.$route.path.includes("edit");
        },
    },
    async created() {
        if (!this.isNewMurid) {
            const response = await axios.get(
                `/api/murids/${this.$route.params.id}`
            );
            this.grade = response.data;
        }
    },
    mounted() {
        this.getKelas();
    },
    methods: {
        getKelas() {
            axios
                .get("/api/grades")
                .then((response) => {
                    this.grades = response.data;
                })
                .catch((error) => {
                    console.log.error;
                });
        },
        async submitForm() {
            try {
                if (this.isNewMurid) {
                    await axios.post("/api/murids", this.murid);
                } else {
                    await axios.put(
                        `/api/murids/${this.$route.params.id}`,
                        this.murid
                    );
                }
                this.$route.push("/murids");
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
