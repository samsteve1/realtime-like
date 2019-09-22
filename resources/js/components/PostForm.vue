<template>
    <div>
        <form action="#" class="form-vertical">
            <div class="form-group">
                <textarea class="form-control" cols="30" rows="3" placeholder="Write something nice." v-model="post"></textarea>
            </div>
            <button class="btn btn-primary" @click.prevent="submit">Post it</button>
        </form>
    </div>
</template>

<script>
import eventBus from '../event';
export default {

    data() {
        return {
            post: ''
        }
    },
    methods: {
        submit() {
            axios.post('/posts', {body:this.post}).then((response) => {
                this.post = ''
                eventBus.$emit('post-submitted', response.data)
            })
        }
    },
}
</script>
