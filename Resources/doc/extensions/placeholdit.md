# Placeholdit

For a flexible usage, there are two ways to getting info from the Placehold.it service. 
One to get the URL, and another to directly get the HTML image tag.

## Usage

### Filter

Placeholdit filter is intented to return the placehold.it URL to the image.
The Filter must be always preceded by the dimensions string.

```
{{ DIMENSIONS | placeholdit(TEXT, TEXT_COLOR, BACKGROUND_COLOR, FORMAT) }}
```

```html+jinja
<img src="{{ "300" | placeholdit('My image', '000') }}" alt="Placeholder image" />
<img src="http://placehold.it/300/000&text=My+image" alt="Placeholder image" />
```

#### Samples

```html+jinja
{{ "300x150" | placeholdit }}
http://placehold.it/300x150&text=foo+bar

{{ "300x150" | placeholdit('foo bar', '000') }}
http://placehold.it/500/000&text=foo+bar


{{ "500" | placeholdit('', '000000', 'ffffff', 'png') }}
http://placehold.it/500.png/000000/ffffff


{{ "500" | placeholdit('', '', '', 'png') }}
http://placehold.it/500.png
```


### Function

Placeholdit function is intented to return the entire HTML image tag, pointing to the placehold.it service.

```
{{ placeholdit(DIMENSIONS, TEXT, TEXT_COLOR, BACKGROUND_COLOR, FORMAT) }}
```

```html+jinja
{{placeholdit('300', 'My image', '000') }}"
<img src="http://placehold.it/300/000&text=My+image" alt="" />
```

#### Samples

```html+jinja
{{ placeholdit("300x150") }}
<img src="http://placehold.it/300x150&text=foo+bar" alt="" />

{{ placeholdit('300x150', 'foo bar', '000') }}
<img src="http://placehold.it/500/000&text=foo+bar" alt="" />


{{ placeholdit('500', '', '000000', 'ffffff', 'png') }}
<img src="http://placehold.it/500.png/000000/ffffff" alt="" />


{{ placeholdit('500', '', '', '', 'png') }}
<img src="http://placehold.it/500.png" alt="" />
```
