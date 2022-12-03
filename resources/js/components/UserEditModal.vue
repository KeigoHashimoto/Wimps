<template>
  <div class="edit-form">
        <h2>Profile<span @click="userModal = !userModal"><i class="fas fa-pen fa-2x"></i></span></h2>
        
        <div v-show="userModal">
            <div class="overlay" @click="userModal = !userModal"></div>
            <div class="form">
                <div class="form-container">
                    <h2>Profile Edit</h2>
                    <form action="../user/update" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" :value="csrf">
                        <div class="form-wrap">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" :value="user.name" class="form-control">
                        </div>
                        <div class="form-wrap">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" :value="user.email"  class="form-control">
                        </div>
                        <button type="submit" class="submit-btn">spit out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userModal:false,
            csrf:document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    props: {
        user:{
            type:Object,
        },
    },
}
</script>

<style>

</style>