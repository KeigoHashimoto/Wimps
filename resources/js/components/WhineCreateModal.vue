<template>
    <div class="whine-form">
        <div v-show="whineModal">
            <div class="overlay" @click="whineModal = !whineModal"></div>
            <div class="modal-form">
                <form action="whine/post" method="post">
                    <input type="hidden" name="_token" :value="csrf">
                    <textarea name="whine" id="whine" class="textarea" cols="100" rows="10" placeholder="ここに弱音を吐いてください。弱音以外は禁止です。"></textarea>
                    <button type="submit" class="submit-btn">spit out</button>
                </form>
            </div>
        </div>
        <button @click="whineModal = !whineModal" class="pen-btn"><i class="fas fa-pen fa-2x"></i></button>
    </div>
</template>

<script>
export default {
    data () {
        return{
            whineModal: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },

}
</script>
