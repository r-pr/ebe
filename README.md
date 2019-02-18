ebe: Elementary Blog Engine
===========================

Technologies used: PHP+MySQL.

# Simple spec

No JS required.

Owner can:

* login
* create, update, delete posts (posts are written in markdown format)
* attach tags to posts
* delete visitors' comments

Visitor can:

* filter posts by tags
* comment posts

## if time permits

* custom themes

# Routes

* login: /?action=login (GET, POST)
* create: /?action=create (GET, POST)
  * previev: post: /?action=create&preview
* delete: /?action=delete&pid=X
* update: /?action=update&pid=X (GET, POST)
* preview: /?action=(create|update&pid=X)&preview
* view one post: /?action=view?pid=X
* view all posts: 

# Config

* N of posts per page
* admin password
* db credentials