<template>
    <div class="container">
        <div class="progress" style="height: 40px">
<div class="progress-bar" role="progressbar" style="{ width: fileProgress + '%' }">{{ fileCurrent }}%
    <hr>
    <input type="file" name="image" multiple="" @change="fileInputChange">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-center">Файлы в очереди ({{ filesOrder.lenght }})</h3>
            <ul class="list-group">
                <li class="list-group-item" v-for="file in filesOrder">
                    {{ file.name }} : {{ file.type }}
                </li>
            </ul>
        </div>
    </div>

</div>
        </div>
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
    export default {
        data (){
            return {
                filesOrder: [],
                filesFinish: [],
                fileProgress: 0,
                fileCurrent: ''
            }
        }

        methods: {
            async fileInputChange () {
                let files = Array.from(event.target.files)
                this.fileOrder = files.sliclet item of files()
                for (let item of files) {
                    await this.uploadFile(item);
            },
            async uploadFile () {
                let form = new FormData()
                form.append ('image', item
                await axios.post ('  '))
        }
    }
</script>
