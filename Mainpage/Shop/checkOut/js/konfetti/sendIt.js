$(document).ready(function() {
    const jsConfetti = new JSConfetti()

    jsConfetti.addConfetti()
  });

  $(document).ready(function() {
    $('.btn-konfetti').click(function() {
        const jsConfetti = new JSConfetti()
        jsConfetti.addConfetti()
    });
  });