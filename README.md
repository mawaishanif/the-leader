# The Leader!

### For Developer

- [x] Add featured image in index pages.
- [x] Add page template portfolio custom post type.
- [x] Fix the single page name for portfolio custom post type.
- [x] Add image size support for the theme.
- [x] Add user portfolio support for theme.
- [x] Implemets logo api.
- [x] Add post format support for all post formats except Status, Aside, Image.
- [ ] Change the avatar size(50x50) when it is uploaded.
- [x] When the avatar feature is added it should come with default image not with empty one.
- [ ] Remove the social urls from index pages.  And show them all on single pages at the end of post.
- [ ] Add excerpt limit and add it to customization.
- [ ] Show search bar in header.
- [ ] Add a post meta box named "Post subtitle" after post formats in post editing area. Add text area in it.
- [ ] Add a new function which will take parameter *number* and will show number of categories provided in parameter.
- [ ] Use above category function on standard post showing single category in index page.
- [ ] Show all categories and all tags on bottom of single post page.
- [ ] Create a new function which will show estimated time reading.
- [ ] truncate_by_words function with parameter get_excerpt, number_of_chars, suffix for expert limitation (can contain HTML tags).
- [x] Create a function userPost that will return a array like this:<br>
  userPost["dataPublished"]----------  returns date of published in ugly format i.e 2015-02-05T08:00:00+08:00<br>
  userPost["datamodified"]-----------  returns date of modified in ugly format i.e 2015-02-05T08:00:00+08:00<br>
  userPost["featuredImage"]---------- returns post's featured image URL<br>
  userPost["featuredImageWidth"]----  returns post's featured image width<br>
  userPost["featuredImageHeight"]---  returns post's featured image height<br>
  userPost["authorName"]-------------  returns author's name<br>
  userPost["authorImage"]-------------  returns author's image<br>
  userPost["postPublisher"]------------  returns the name of Organization (the user will set in customizer - needed for schema.org) <br>
  userPost["blogLogo"]----------------  returns the URL of blog logo<br>
  userPost["blogLogoWidth"]----------  returns the width of Logo image<br>
  userPost["blogLogoHeight"]---------  returns the height of Logo image<br>
  userPost["tags"]----------------------  returns an array of tags separated by commas <br>
- [ ] Remove function the_leader_posted_on() from content.php and create separate functions that shows 'posted on', 'author name' and 'author image (only URL)' respectively.
- [ ] Create two funtions that displays the date (and time) a post was published and last modified respectively (format: 2015-02-05T08:00:00+08:00 )
- [ ] Create function that displays the width and height in array of featured image of current post.


### For Designer

- [ ] Add schema.org markups to blog
