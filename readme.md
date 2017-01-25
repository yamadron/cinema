# A CMS built in Laravel

This CMS can be used to manage digital content for a simple cinema website. It has an admin panel accessed by user admins to add, edit and delete movies and events.

## Restful API

It offers also a RESTful API for current categories.

For events you can use prefixes:
- /api/v1/events
- /api/v1/events/{event}
- /api/v1/events (POST)
- /api/v1/events/{event} (PATCH)
- /api/v1/events/{event} (DELETE)

For movies:
- /api/v1/movies
- /api/v1/movies/{movie}
- /api/v1/movies (POST)
- /api/v1/movies/{movie} (PATCH)
- /api/v1/movies/{movie} (DELETE)

For users:
- /api/v1/users
- /api/v1/users/{user}
- /api/v1/users (POST)
- /api/v1/users/{user} (PATCH)
- /api/v1/users/{user} (DELETE)

Work in progress for additional features.
