<div id="about" class="content">
<p>This is the About Page.</p>
<h2>Lets play with absolute and relative paths</h2>
<p>As I don't want to mess up configuration please click "Dirty setup" link to start the demo. 
    Also you'll have to click it every time you want to reset the demo.</p>
<p>Before you start demo, please point your cursor to every link and see that on the beginning they all point to the same URL.</p>
    <a href="http://sportz.localhost/main/home/about">Dirty setup</a>    
    
<h3>Absolute path</h3>
<p>Absolute path means that it includes full path to requested object including domain name, folders, subfolders and filename 
    (in case of plain static HTML website) or controllers, actions and parameters (in case of using dynamicaly generated pages)</p>
<p>This means that its format will not depend on previouse states of the page or browser, it always will point to the same place.</p>
<p>This is how absolute path looks like in HTML code:</p>
<code>&lsaquo;a href="http://sportz.localhost/main/home/about/parameter"&rsaquo;Absolute path&lsaquo;/a&rsaquo;</code>
<p>
<?php echo '<a href="http://sportz.localhost/main/home/about/parameter">Absolute path</a>';?>
<h3>Relative path 1</h3>
<p>Relative URLs behave the same way as paths in filesystem in terms of how whole URL will be modified.</p>
<p>In our first case this parameter will be appended to our domain base, to "sportz.localhost" (Think of it as of root in filesystem. When you start your folder or filename with "/" it means that we have to look starting from the root.)</p>
<p>This type of relative path looks like this:</p>
<code>&lsaquo;a href="/main/home/about/parameter"&rsaquo;Relative path1&lsaquo;/a&rsaquo;</code>
<p>
<?php echo '<a href="/main/home/about/parameter">Relative path 1</a>';?>
<h3>Relative path 2</h3>
<p>In case of "Relative path 2" browser will look "in current folder" - value of "href" will be appended to current page's URL minus parameter.</p>
<p>The only difference with filesystem - click several times on last link to see what will happen.</p>
<p>And this is how our code looks like:</p>
<code>&lsaquo;a href="about/parameter"&rsaquo;Relative path 2&lsaquo;/a&rsaquo;</code>
<p>
<?php echo '<a href="about/parameter">Relative path 2</a>';?>
<?php echo br(6);?>
<p>This is the bottom of the About page</p>

</div>