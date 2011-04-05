<div id="disqus_thread"></div>
<script type="text/javascript">
    var disqus_shortname = '<?= $disqus ?>';
    var disqus_url = '<?= site_url( strtolower(url_title($post['content']['title'])) ) ?>';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>