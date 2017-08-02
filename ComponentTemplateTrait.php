namespace Zarganwar\Components\traits;


use Nette\Utils\Strings;
use ReflectionClass;

trait ComponentTemplateTrait
{
	public function getTemplateName(): string
	{
		$rc = (new ReflectionClass(self::class));
		$templateName = Strings::replace($rc->getFileName(), '~.([a-zA-Z0-9]+)$~', '.latte');
		return $templateName;
	}

	public function renderTemplate()
	{
		$this->template->setFile($this->getTemplateName());
		$this->template->render();
	}
}
