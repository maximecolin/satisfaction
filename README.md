#Satisfaction

Satisfaction is a PHP implementation of the Specification pattern for DDD.

[![Build Status](https://travis-ci.org/maximecolin/satisfaction.svg)](https://travis-ci.org/maximecolin/satisfaction)

##Purpose

The aim of the specification pattern is to write domain specifications in reusable classes instead of dispatching domain rules conditons in all your project.

##Installation

```
composer require maximecolin/satisfaction
```

##Usage

###Simple example

My model :

```
class Article
{
	public $published = false;
	public $publishedAt;
}
```

My specification :

```
class PublishedArticle extends CompositeSpecification
{
	public function isSatisfiedBy($article)
	{
		return $article->published === true && $article->publishedAt <= new \DateTime();
	}
}
```

I want to know if an article is published :

```
$specicification = new PublishedArticle();

if ($specification->isSatisfiedBy($article)) {
	// Do something
}
```

### Or, And, Not

You can chain specifications with "or", "and" or "not" condition.

```
// If both foo and bar are satified
if ((new FooSpecification())->andX(new BarSpecification())->isSatifiedBy($object)) {
	// Do something
}
```

```
// If foo is satisfied or bar is not
if ((new FooSpecification())->orX((new BarSpecification())->not())->isSatifiedBy($object)) {
	// Do something
}
```

##Author

Maxime Colin <www.maximecolin.fr>

##Licence

See the LICENCE file.

##Acknowledgements

Thanks to Jean-François Lépine for his talk about DDD.
