export default {
    data() {
        return {
            isRequesting: false,
            requestUrl: '',
        }
    },
    mounted() {
        if (this.isEmpty && !this.noFetchOnMount) {
            this.fetchRequest();
        }
    },
    computed: {
        isEmpty() {
            return true;
        }
    },
    methods: {
        fetchRequest() {
            this.isRequesting = true;
            Nova.request()
                .get(this.getRequestUrl(), this.getRequestData())
                .then((response) => {
                    this.onRequestSuccess(response);
                })
                .catch((error) => {
                    this.onRequestError(error);
                })
                .finally(() => {
                    this.onRequestFinish();
                    this.isRequesting = false;
                });
        },
        onRequestSuccess(response) {
        },
        onRequestError(error) {
        },
        onRequestFinish() {
        },
        getRequestUrl() {
            return this.requestUrl;
        },
        getRequestData() {
            return {};
        }
    }
}
