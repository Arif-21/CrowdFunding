<template>
    <div>
        <v-card :to="'/blog/'+blog.id">
            <v-img
                :src="blog.image"
                class="white--text"
                height="200px"
            >
                <v-card-title
                    v-text="blog.title"
                    class="fill-height align-end"
                >
                </v-card-title>
            </v-img>
        </v-card>
    </div>
</template>
<script>
    export default {
        name: 'blog-item',
        props: ['blog'],
    }
</script>