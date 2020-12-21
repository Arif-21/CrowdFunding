var app = new Vue({
    el: '#app',
    data: {
        score: 0,
        content: '',
        comments: ['komentar satu'],
        date: '21-12-2020',
    },
    methods: {
        addComment: function() {
            this.comments.push(this.content);
            this.content = '';
        },
        addScore: function() {
            this.score = this.score + 1;
        },
        reduceScore: function(index) {
            this.score = this.score - 1;
        },
    },
})