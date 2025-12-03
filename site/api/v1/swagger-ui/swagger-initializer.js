function HideTopbarPlugin() {
    // this plugin overrides the Topbar component to return nothing
    return {
        components: {
            Topbar: function () {
                return null
            }
        }
    }
}

window.onload = function () {
    //<editor-fold desc="Changeable Configuration Block">

    // the following lines will be replaced by docker/configurator, when it runs in a docker-container
    window.ui = SwaggerUIBundle({
        url: "http://localhost:8080/api/v1/openapi.json",
        dom_id: '#swagger-ui',
        deepLinking: true,
        presets: [
            SwaggerUIBundle.presets.apis,
            SwaggerUIStandalonePreset
        ],
        plugins: [
            SwaggerUIBundle.plugins.DownloadUrl,
            HideTopbarPlugin,
        ],
        layout: "StandaloneLayout",
        validatorUrl: "none",
    });

    //</editor-fold>
};
