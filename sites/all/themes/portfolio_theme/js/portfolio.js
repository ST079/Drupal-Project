(function ($, Drupal, window) {
  /**
   * Drupal behavior for portfolio effects
   * This runs when page loads AND after AJAX updates
   */
  Drupal.behaviors.portfolioEffects = {
    attach: function (context, settings) {
      // Add fade-in effect to projects
      // 'context' ensures it works with dynamically loaded content
      // '.once()' prevents applying effect twice
      $(".portfolio-project, .project-item", context).once(
        "portfolio-fade",
        function () {
          // Start invisible
          $(this).css("opacity", 0);

          // Fade in
          $(this).animate(
            {
              opacity: 1,
            },
            800,
          );
        },
      );

      // Add hover effect
      $(".project-item", context).once("portfolio-hover", function () {
        $(this).hover(
          function () {
            // Mouse enter
            $(this).css({
              transform: "scale(1.02)",
              transition: "transform 0.3s ease",
            });
          },
          function () {
            // Mouse leave
            $(this).css("transform", "scale(1)");
          },
        );
      });

      // Simple filter (if you add filter buttons later)
      $(".filter-button", context).once("portfolio-filter", function () {
        $(this).click(function (e) {
          e.preventDefault();
          var filter = $(this).data("filter");

          $(".project-item").each(function () {
            if (filter === "all" || $(this).data("technology") === filter) {
              $(this).fadeIn();
            } else {
              $(this).fadeOut();
            }
          });
        });
      });
    },
  };
})(jQuery, Drupal, window);
