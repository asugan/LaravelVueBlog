<template>
    <div>
        <h3 class="text-center">Create Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Name</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.title"
                        />
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.body"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return { product: {} };
    },
    methods: {
        addProduct() {
            axios
                .post("api/postproduct", this.product)
                .then((response) => this.$router.push({ name: "Home" }))
                .catch((err) => console.log(err))
                .finally(() => (this.loading = false));
        },
    },
};
</script>
