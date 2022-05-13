
(function ($) {
  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/photo-sphere-viewer.default",
      function (scope) {
        scope.find(".viewer").each(function () {
          var element = $(this)[0];
          var settings = $(this).data("settings");
          if (element) {
            new PhotoSphereViewer.Viewer(settings);
          }
        });
      }
    );
  });
})(jQuery);
