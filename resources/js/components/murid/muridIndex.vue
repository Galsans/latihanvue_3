<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Table Murid</h3>
                        <router-link to="/murids/create" class="btn btn-success"
                            >ADD</router-link
                        >
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(murid, index) in murids"
                                        :key="murid.index"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ murid.nama }}</td>
                                        <td>{{ murid.grade_id }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <router-link
                                                    :to="`/murids/${murid.id}`"
                                                    class="btn btn-info"
                                                    >View</router-link
                                                >
                                                <router-link
                                                    :to="`/murids/${murid.id}/edit`"
                                                    class="btn btn-secondary"
                                                    >Edit</router-link
                                                >
                                                <button
                                                    type="submit"
                                                    @click="
                                                        deleteMurid(murid.id)
                                                    "
                                                    class="btn btn-danger"
                                                >
                                                    Remove
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
            murids: [],
        };
    },
    async created() {
        try {
            const response = await axios.get("/api/murids", this.murids);
            this.murids = response.data;
        } catch (error) {
            console.error(error);
        }
    },
    methods: {
        async deleteMurid(id) {
            try {
                await axios.delete(`/api/grades/${this.$route.params.id}`);
                this.murids = this.murids.filter((murid) => murid.id !== id);
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
