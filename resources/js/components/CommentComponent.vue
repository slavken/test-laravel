<template>
    <div>
        <div class="card mt-4">
            <h5 class="card-header">Оставить комментарий</h5>
            <div class="card-body">
                <form v-if="!isHidden" @submit.prevent="sendComment">
                    <div class="form-group">
                        <label for="subject">Тема сообщения</label>
                        <input v-model="subject" type="text"  class="form-control" id="subject" required="true">
                    </div>
                    <div class="form-group">
                        <label for="body">Текст сообщения</label>
                        <textarea v-model="body" rows="3" class="form-control" id="body" required="true"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
                <div v-else class="text-center">
                    <span class="bg-success text-light p-1 rounded">Success</span>
                    Комментарий добавлен!
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            article: {
                required: true
            }
        },
        data() {
            return {
                subject: null,
                body: null,
                isHidden: false
            }
        },
        methods: {
            sendComment() {
                if (this.subject.trim() && this.body.trim()) {
                    fetch('/api/comments', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            'id': this.article,
                            'subject': this.subject,
                            'body': this.body
                        })
                    })
                    .then(res => res.json())
                    .then(res => this.isHidden = true);
                }
            }
        }
    }
</script>
