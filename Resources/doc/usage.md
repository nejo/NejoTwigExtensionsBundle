# Placeholdit

## Filter

The Filter must be always preceded by the dimensions string.

Here are some usage samples:

```html+jinja
{{ "300" | placeholdit }} --> http://placehold.it/300
{{ "300x150" | placeholdit }} --> http://placehold.it/300x150
{{ "300x150" | placeholdit('foo bar') }} --> http://placehold.it/300x150&text=foo+bar
{{ "500" | placeholdit('foo', '000000') }} --> http://placehold.it/500/000000&text=foo
{{ "500" | placeholdit('', '000000', 'ffffff') }} --> http://placehold.it/500/000000/ffffff
{{ "500" | placeholdit('', '000000', 'ffffff', 'png') }} --> http://placehold.it/500.png/000000/ffffff
{{ "500" | placeholdit('', '', '', 'png') }} --> http://placehold.it/500.png
```