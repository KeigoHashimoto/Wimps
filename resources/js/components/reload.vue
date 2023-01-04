<template>
    <div class="reload" @click="reload">
        <div>みんなの弱音がランダムで更新されます。
            <push-component></push-component>
        </div>
        <i class="fas fa-sync-alt fa-1x reload-btn"></i>
    </div>
</template>

<script>
export default {
    methods:{
        reload(){
            window.location.reload();
        },
    },

}
</script>
