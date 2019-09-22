<template>
    <div class="like">
       <a href="#" @click.prevent="like" class="btn btn-secondary like__button">I like this</a>
    </div>
</template>

<script>
import eventBus from '../event'

export default {
    props: ['post'],

    methods: {
        like() {
            axios.post('/posts/' + this.post.id + '/likes').then((response) => {
                eventBus.$emit('post-liked', this.post.id, true);
            }).catch((error) => {
                console.log(error)
                alert('Unable to complete request, retry.');
            })
        }
    },

}
</script>

<style scoped>
    .like{
        display:none;
        position:absolute;
        width:100%;
        height:100%;
        top:0; left:0;
        background:rgba(0,0,0, .05);
        border-radius:3px;
        box-sizing: border-box;

    }

    .like__button{
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translate(0, -50%);
    }
</style>
