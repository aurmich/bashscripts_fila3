# Analisi PHPStan - Modulo Blog - Livello 7

[⬅️ Torna alla Roadmap del modulo](../roadmap.md)


Data analisi: 2025-04-11 12:59:58

## Risultato: ERRORI

Rilevati 62 errori a livello 7.

### Dettaglio errori
```
Note: Using configuration file /var/www/html/_bases/base_predict_fila3_mono/laravel/phpstan.neon.
   0/531 [░░░░░░░░░░░░░░░░░░░░░░░░░░░░]   0%[1G[2K  20/531 [▓░░░░░░░░░░░░░░░░░░░░░░░░░░░]   3%[1G[2K 160/531 [▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░░░░]  30%[1G[2K 180/531 [▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░░░]  33%[1G[2K 280/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░]  52%[1G[2K 300/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░]  56%[1G[2K 320/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░]  60%[1G[2K 340/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░]  64%[1G[2K 360/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░]  67%[1G[2K 380/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░]  71%[1G[2K 440/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░]  82%[1G[2K 460/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░]  86%[1G[2K 480/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░]  90%[1G[2K 500/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░]  94%[1G[2K 531/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%

 ------ ---------------------------------------------------------------------------------- 
  Line   Database/Factories/ContactEntryFactory.php                                        
 ------ ---------------------------------------------------------------------------------- 
  :13    PHPDoc tag @extends has invalid type                                              
         Modules\Blog\Models\ContactEntry.                                                 
         🪪  class.notFound                                                                
         ✏️  Database/Factories/ContactEntryFactory.php                                    
  :13    Type Modules\Blog\Models\ContactEntry in generic type                             
         Illuminate\Database\Eloquent\Factories\Factory<Modules\Blog\Models\ContactEntry>  
         in PHPDoc tag @extends is not subtype of template type TModel of                  
         Illuminate\Database\Eloquent\Model of class                                       
         Illuminate\Database\Eloquent\Factories\Factory.                                   
         🪪  generics.notSubtype                                                           
         ✏️  Database/Factories/ContactEntryFactory.php                                    
  :20    Class Modules\Blog\Models\ContactEntry not found.                                 
         🪪  class.notFound                                                                
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols               
         ✏️  Database/Factories/ContactEntryFactory.php                                    
  :20    Property Modules\Blog\Database\Factories\ContactEntryFactory::$model              
         has unknown class Modules\Blog\Models\ContactEntry as its type.                   
         🪪  class.notFound                                                                
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols               
         ✏️  Database/Factories/ContactEntryFactory.php                                    
 ------ ---------------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------- 
  Line   Filament/Fields/ArticleContent.php                         
 ------ ----------------------------------------------------------- 
  :29    Missing parameter $name (string) in call to static method  
         Filament\Forms\Components\Builder\Block::make().           
         🪪  argument.missing                                       
         ✏️  Filament/Fields/ArticleContent.php                     
  :29    Unknown parameter $context in call to static method        
         Filament\Forms\Components\Builder\Block::make().           
         🪪  argument.unknown                                       
         ✏️  Filament/Fields/ArticleContent.php                     
 ------ ----------------------------------------------------------- 

 ------ ----------------------------------------------------------- 
  Line   Filament/Fields/ArticleSidebar.php                         
 ------ ----------------------------------------------------------- 
  :29    Missing parameter $name (string) in call to static method  
         Filament\Forms\Components\Builder\Block::make().           
         🪪  argument.missing                                       
         ✏️  Filament/Fields/ArticleSidebar.php                     
  :29    Unknown parameter $context in call to static method        
         Filament\Forms\Components\Builder\Block::make().           
         🪪  argument.unknown                                       
         ✏️  Filament/Fields/ArticleSidebar.php                     
 ------ ----------------------------------------------------------- 

 ------ ------------------------------------------------------------------------------ 
  Line   Filament/Resources/ArticleResource.php                                        
 ------ ------------------------------------------------------------------------------ 
  :22    Non-abstract class Modules\Blog\Filament\Resources\ArticleResource            
         contains abstract method getFormSchema() from class                           
         Modules\Xot\Filament\Resources\XotBaseResource.                               
         ✏️  Filament/Resources/ArticleResource.php                                    
  :168   Method Modules\Blog\Filament\Resources\ArticleResource::form()                
         overrides final method                                                        
         Modules\Xot\Filament\Resources\XotBaseResource::form().                       
         ✏️  Filament/Resources/ArticleResource.php                                    
  :183   Call to an undefined static method                                            
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::route().  
         🪪  staticMethod.notFound                                                     
         ✏️  Filament/Resources/ArticleResource.php                                    
 ------ ------------------------------------------------------------------------------ 

 ------ ---------------------------------------------------------------------------------------------- 
  Line   Filament/Resources/ArticleResource/Pages/ListArticles.php                                     
 ------ ---------------------------------------------------------------------------------------------- 
  :21    Class                                                                                         
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles                            
         extends unknown class Modules\Xot\Filament\Pages\XotBaseListRecords.                          
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols                           
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                 
  :126   Access to an undefined property                                                               
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::$layoutView.              
         🪪  property.notFound                                                                         
         💡 Learn more:                                                                                
            https://phpstan.org/blog/solving-phpstan-access-to-undefined-property                      
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                 
  :127   Access to an undefined property                                                               
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::$layoutView.              
         🪪  property.notFound                                                                         
         💡 Learn more:                                                                                
            https://phpstan.org/blog/solving-phpstan-access-to-undefined-property                      
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                 
  :128   Call to an undefined method                                                                   
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::getTableHeaderActions().  
         🪪  method.notFound                                                                           
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                 
 ------ ---------------------------------------------------------------------------------------------- 

 ------ ---------------------------------------------------------------------------- 
  Line   Filament/Resources/BannerResource.php                                       
 ------ ---------------------------------------------------------------------------- 
  :19    Non-abstract class Modules\Blog\Filament\Resources\BannerResource           
         contains abstract method getFormSchema() from class                         
         Modules\Xot\Filament\Resources\XotBaseResource.                             
         ✏️  Filament/Resources/BannerResource.php                                   
  :31    Method Modules\Blog\Filament\Resources\BannerResource::form()               
         overrides final method                                                      
         Modules\Xot\Filament\Resources\XotBaseResource::form().                     
         ✏️  Filament/Resources/BannerResource.php                                   
  :126   Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::route().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource.php                                   
 ------ ---------------------------------------------------------------------------- 

 ------ ---------------------------------------------------------------------------- 
  Line   Filament/Resources/BannerResource/Pages/ListBanners.php                     
 ------ ---------------------------------------------------------------------------- 
  :21    Class                                                                       
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners            
         extends unknown class Modules\Xot\Filament\Pages\XotBaseListRecords.        
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols         
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :52    Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::trans().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :56    Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::trans().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :60    Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::trans().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :64    Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::trans().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
 ------ ---------------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------------------- 
  Line   Filament/Resources/CategoryResource.php                                          
 ------ --------------------------------------------------------------------------------- 
  :17    Non-abstract class Modules\Blog\Filament\Resources\CategoryResource              
         contains abstract method getFormSchema() from class                              
         Modules\Xot\Filament\Resources\XotBaseResource.                                  
         ✏️  Filament/Resources/CategoryResource.php                                      
  :76    Method Modules\Blog\Filament\Resources\CategoryResource::form()                  
         overrides final method                                                           
         Modules\Xot\Filament\Resources\XotBaseResource::form().                          
         ✏️  Filament/Resources/CategoryResource.php                                      
  :86    Call to an undefined static method                                               
         Modules\Blog\Filament\Resources\CategoryResource\Pages\ListCategories::route().  
         🪪  staticMethod.notFound                                                        
         ✏️  Filament/Resources/CategoryResource.php                                      
 ------ --------------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------- 
  Line   Filament/Resources/CategoryResource/Pages/ListCategories.php           
 ------ ----------------------------------------------------------------------- 
  :14    Class                                                                  
         Modules\Blog\Filament\Resources\CategoryResource\Pages\ListCategories  
         extends unknown class Modules\Xot\Filament\Pages\XotBaseListRecords.   
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols    
         ✏️  Filament/Resources/CategoryResource/Pages/ListCategories.php       
 ------ ----------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------------------------- 
  Line   Filament/Resources/ProfileResource/Pages/ListProfiles.php                              
 ------ --------------------------------------------------------------------------------------- 
  :32    Protected method                                                                       
         Modules\Blog\Filament\Resources\ProfileResource\Pages\ListProfiles::getTableActions()  
         overriding public method                                                               
         Modules\Xot\Filament\Resources\Pages\XotBaseListRecords::getTableActions()             
         should also be public.                                                                 
         ✏️  Filament/Resources/ProfileResource/Pages/ListProfiles.php                          
 ------ --------------------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------------------------ 
  Line   Filament/Resources/TextWidgetResource.php                                           
 ------ ------------------------------------------------------------------------------------ 
  :16    Non-abstract class Modules\Blog\Filament\Resources\TextWidgetResource               
         contains abstract method getFormSchema() from class                                 
         Modules\Xot\Filament\Resources\XotBaseResource.                                     
         ✏️  Filament/Resources/TextWidgetResource.php                                       
  :25    Method Modules\Blog\Filament\Resources\TextWidgetResource::form()                   
         overrides final method                                                              
         Modules\Xot\Filament\Resources\XotBaseResource::form().                             
         ✏️  Filament/Resources/TextWidgetResource.php                                       
  :84    Call to an undefined static method                                                  
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\ListTextWidgets::route().  
         🪪  staticMethod.notFound                                                           
         ✏️  Filament/Resources/TextWidgetResource.php                                       
 ------ ------------------------------------------------------------------------------------ 

 ------ -------------------------------------------------------------------------- 
  Line   Filament/Resources/TextWidgetResource/Pages/ListTextWidgets.php           
 ------ -------------------------------------------------------------------------- 
  :11    Class                                                                     
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\ListTextWidgets  
         extends unknown class Modules\Xot\Filament\Pages\XotBaseListRecords.      
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols       
         ✏️  Filament/Resources/TextWidgetResource/Pages/ListTextWidgets.php       
 ------ -------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------- 
  Line   Models/Article.php                                                                 
 ------ ----------------------------------------------------------------------------------- 
  :279   Call to static method make() on an unknown class                                   
         Modules\Blog\Models\XotData.                                                       
         🪪  class.notFound                                                                 
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols                
         ✏️  Models/Article.php                                                             
  :281   Unable to resolve the template type TRelatedModel in call to method                
         Modules\Blog\Models\Article::belongsTo()                                           
         🪪  argument.templateType                                                          
         💡 See:                                                                            
            https://phpstan.org/blog/solving-phpstan-error-unable-to-resolve-template-type  
         ✏️  Models/Article.php                                                             
 ------ ----------------------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
  Line   Models/BaseTreeModel.php                                                                                                                           
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
  :42    Parameter #1 $model of method                                                                                                                      
         Illuminate\Database\Eloquent\Relations\BelongsTo<static(Modules\Blog\Models\BaseTreeModel),$this(Modules\Blog\Models\BaseTreeModel)>::associate()  
         expects int|static(Modules\Blog\Models\BaseTreeModel)|string|null,                                                                                 
         Illuminate\Database\Eloquent\Model given.                                                                                                          
         🪪  argument.type                                                                                                                                  
         ✏️  Models/BaseTreeModel.php                                                                                                                       
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------------------- 
  Line   Models/Profile.php                                                               
 ------ --------------------------------------------------------------------------------- 
  :131   Generic type                                                                     
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Article>      
         in PHPDoc tag @return does not specify all template types of class               
         Illuminate\Database\Eloquent\Relations\HasMany: TRelatedModel,                   
         TDeclaringModel                                                                  
         🪪  generics.lessTypes                                                           
         ✏️  Models/Profile.php                                                           
  :133   Method Modules\Blog\Models\Profile::articles() should return                     
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Article>      
         but returns                                                                      
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Article,      
         $this(Modules\Blog\Models\Profile)>.                                             
         🪪  return.type                                                                  
         ✏️  Models/Profile.php                                                           
  :139   Generic type                                                                     
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Transaction>  
         in PHPDoc tag @return does not specify all template types of class               
         Illuminate\Database\Eloquent\Relations\HasMany: TRelatedModel,                   
         TDeclaringModel                                                                  
         🪪  generics.lessTypes                                                           
         ✏️  Models/Profile.php                                                           
  :141   Method Modules\Blog\Models\Profile::transanctions() should return                
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Transaction>  
         but returns                                                                      
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Transaction,  
         $this(Modules\Blog\Models\Profile)>.                                             
         🪪  return.type                                                                  
         ✏️  Models/Profile.php                                                           
 ------ --------------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------- 
  Line   Models/Taggable.php                                              
 ------ ----------------------------------------------------------------- 
  :73    PHPDoc type array of property                                    
         Modules\Blog\Models\Taggable::$attributes is not covariant with  
         PHPDoc type array<string, mixed> of overridden property          
         Illuminate\Database\Eloquent\Model::$attributes.                 
         🪪  property.phpDocType                                          
         💡 You can fix 3rd party PHPDoc types with stub files:           
         💡 https://phpstan.org/user-guide/stub-files                     
                                                                          
         ✏️  Models/Taggable.php                                          
 ------ ----------------------------------------------------------------- 

 ------ -------------------------------------------------------------------------- 
  Line   app/Actions/Banner/ImportBannerFromByJsonTextAction.php                   
 ------ -------------------------------------------------------------------------- 
  :75    Property Modules\Blog\Models\Banner::$start_date                          
         (Illuminate\Support\Carbon|null) does not accept Carbon\Carbon.           
         🪪  assign.propertyType                                                   
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :79    Property Modules\Blog\Models\Banner::$end_date                            
         (Illuminate\Support\Carbon|null) does not accept Carbon\Carbon.           
         🪪  assign.propertyType                                                   
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :83    Access to an undefined property                                           
         Modules\Blog\Models\Banner::$category_dict.                               
         🪪  property.notFound                                                     
         💡 Learn more:                                                            
            https://phpstan.org/blog/solving-phpstan-access-to-undefined-property  
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :91    Access to an undefined property Modules\Blog\Models\Banner::$slug.        
         🪪  property.notFound                                                     
         💡 Learn more:                                                            
            https://phpstan.org/blog/solving-phpstan-access-to-undefined-property  
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :98    Call to an undefined method                                               
         Modules\Blog\Models\Banner::setTranslation().                             
         🪪  method.notFound                                                       
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :102   Call to an undefined method                                               
         Modules\Blog\Models\Banner::setTranslation().                             
         🪪  method.notFound                                                       
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
 ------ -------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------- 
  Line   app/Datas/ArticleData.php                                                          
 ------ ----------------------------------------------------------------------------------- 
  :180   Unable to resolve the template type TKey in call to function collect               
         🪪  argument.templateType                                                          
         💡 See:                                                                            
            https://phpstan.org/blog/solving-phpstan-error-unable-to-resolve-template-type  
         ✏️  app/Datas/ArticleData.php                                                      
  :180   Unable to resolve the template type TValue in call to function                     
         collect                                                                            
         🪪  argument.templateType                                                          
         💡 See:                                                                            
            https://phpstan.org/blog/solving-phpstan-error-unable-to-resolve-template-type  
         ✏️  app/Datas/ArticleData.php                                                      
  :190   Unable to resolve the template type TKey in call to function collect               
         🪪  argument.templateType                                                          
         💡 See:                                                                            
            https://phpstan.org/blog/solving-phpstan-error-unable-to-resolve-template-type  
         ✏️  app/Datas/ArticleData.php                                                      
  :190   Unable to resolve the template type TValue in call to function                     
         collect                                                                            
         🪪  argument.templateType                                                          
         💡 See:                                                                            
            https://phpstan.org/blog/solving-phpstan-error-unable-to-resolve-template-type  
         ✏️  app/Datas/ArticleData.php                                                      
 ------ ----------------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------------------ 
  Line   app/Filament/Resources/ArticleResource.php                                    
 ------ ------------------------------------------------------------------------------ 
  :187   Call to an undefined static method                                            
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::route().  
         🪪  staticMethod.notFound                                                     
         ✏️  app/Filament/Resources/ArticleResource.php                                
 ------ ------------------------------------------------------------------------------ 

 ------ ------------------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/ArticleResource/Pages/ListArticles.php                              
 ------ ------------------------------------------------------------------------------------------- 
  :55    Method                                                                                     
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::getTableActions()      
         should return array<string,                                                                
         Filament\Tables\Actions\Action|Filament\Tables\Actions\ActionGroup>                        
         but returns array{Filament\Tables\Actions\EditAction,                                      
         Filament\Tables\Actions\ViewAction,                                                        
         Filament\Tables\Actions\DeleteAction}.                                                     
         🪪  return.type                                                                            
         ✏️  app/Filament/Resources/ArticleResource/Pages/ListArticles.php                          
  :71    Method                                                                                     
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::getTableBulkActions()  
         should return array<string, Filament\Tables\Actions\BulkAction> but                        
         returns array<int, Filament\Tables\Actions\DeleteBulkAction>.                              
         🪪  return.type                                                                            
         ✏️  app/Filament/Resources/ArticleResource/Pages/ListArticles.php                          
 ------ ------------------------------------------------------------------------------------------- 

 ------ ---------------------------------------------------------------------------- 
  Line   app/Filament/Resources/BannerResource.php                                   
 ------ ---------------------------------------------------------------------------- 
  :125   Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::route().  
         🪪  staticMethod.notFound                                                   
         ✏️  app/Filament/Resources/BannerResource.php                               
 ------ ---------------------------------------------------------------------------- 

 ------ -------------------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/BannerResource/Pages/ListBanners.php                                 
 ------ -------------------------------------------------------------------------------------------- 
  :50    Method                                                                                      
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::getListTableColumns()     
         should return array<string, Filament\Tables\Columns\Column> but                             
         returns array<int,                                                                          
         Filament\Tables\Columns\SpatieMediaLibraryImageColumn|Filament\Tables\Columns\TextColumn>.  
         🪪  return.type                                                                             
         ✏️  app/Filament/Resources/BannerResource/Pages/ListBanners.php                             
 ------ -------------------------------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/CategoryResource.php                                      
 ------ --------------------------------------------------------------------------------- 
  :80    Call to an undefined static method                                               
         Modules\Blog\Filament\Resources\CategoryResource\Pages\ListCategories::route().  
         🪪  staticMethod.notFound                                                        
         ✏️  app/Filament/Resources/CategoryResource.php                                  
 ------ --------------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------------------------ 
  Line   app/Filament/Resources/TextWidgetResource.php                                       
 ------ ------------------------------------------------------------------------------------ 
  :83    Call to an undefined static method                                                  
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\ListTextWidgets::route().  
         🪪  staticMethod.notFound                                                           
         ✏️  app/Filament/Resources/TextWidgetResource.php                                   
 ------ ------------------------------------------------------------------------------------ 

 ------ ---------------------------------------------------------------------- 
  Line   app/Models/Banner.php                                                 
 ------ ---------------------------------------------------------------------- 
  :120   PHPDoc type array<string, mixed> of property                          
         Modules\Blog\Models\Banner::$casts is not covariant with PHPDoc type  
         array<string, string> of overridden property                          
         Illuminate\Database\Eloquent\Model::$casts.                           
         🪪  property.phpDocType                                               
         💡 You can fix 3rd party PHPDoc types with stub files:                
         💡 https://phpstan.org/user-guide/stub-files                          
                                                                               
         ✏️  app/Models/Banner.php                                             
 ------ ---------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
  Line   app/Models/BaseTreeModel.php                                                                                                                       
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
  :42    Parameter #1 $model of method                                                                                                                      
         Illuminate\Database\Eloquent\Relations\BelongsTo<static(Modules\Blog\Models\BaseTreeModel),$this(Modules\Blog\Models\BaseTreeModel)>::associate()  
         expects int|static(Modules\Blog\Models\BaseTreeModel)|string|null,                                                                                 
         Illuminate\Database\Eloquent\Model given.                                                                                                          
         🪪  argument.type                                                                                                                                  
         ✏️  app/Models/BaseTreeModel.php                                                                                                                   
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------------------- 
  Line   app/Models/Profile.php                                                           
 ------ --------------------------------------------------------------------------------- 
  :133   Method Modules\Blog\Models\Profile::articles() should return                     
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Article,      
         Modules\Blog\Models\Profile> but returns                                         
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Article,      
         $this(Modules\Blog\Models\Profile)>.                                             
         🪪  return.type                                                                  
         💡 Template type TDeclaringModel on class                                        
            Illuminate\Database\Eloquent\Relations\HasMany is not covariant.              
            Learn more:                                                                   
            https://phpstan.org/blog/whats-up-with-template-covariant                     
         ✏️  app/Models/Profile.php                                                       
  :141   Method Modules\Blog\Models\Profile::transanctions() should return                
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Transaction,  
         Modules\Blog\Models\Profile> but returns                                         
         Illuminate\Database\Eloquent\Relations\HasMany<Modules\Blog\Models\Transaction,  
         $this(Modules\Blog\Models\Profile)>.                                             
         🪪  return.type                                                                  
         💡 Template type TDeclaringModel on class                                        
            Illuminate\Database\Eloquent\Relations\HasMany is not covariant.              
            Learn more:                                                                   
            https://phpstan.org/blog/whats-up-with-template-covariant                     
         ✏️  app/Models/Profile.php                                                       
 ------ --------------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------- 
  Line   app/Models/Taggable.php                                          
 ------ ----------------------------------------------------------------- 
  :73    PHPDoc type array of property                                    
         Modules\Blog\Models\Taggable::$attributes is not covariant with  
         PHPDoc type array<string, mixed> of overridden property          
         Illuminate\Database\Eloquent\Model::$attributes.                 
         🪪  property.phpDocType                                          
         💡 You can fix 3rd party PHPDoc types with stub files:           
         💡 https://phpstan.org/user-guide/stub-files                     
                                                                          
         ✏️  app/Models/Taggable.php                                      
 ------ ----------------------------------------------------------------- 

 [ERROR] Found 62 errors                                                        
```

### Suggerimenti per la risoluzione

#### Errori di tipo 'Access to an undefined property'

Questi errori indicano l'accesso a proprietà che non esistono nella classe. Per risolvere:

1. Verificare se la proprietà è definita correttamente
2. Aggiungere la proprietà mancante alla classe
3. Per proprietà dinamiche, utilizzare `@property` nelle annotazioni PHPDoc
4. Per modelli Eloquent, usare `@property` per documentare le colonne del database

### Consigli generali

1. Iniziare risolvendo gli errori più semplici e ripetitivi
2. Utilizzare `@phpstan-ignore-next-line` solo come ultima risorsa per errori non risolvibili
3. Considerare l'aggiunta di test unitari per verificare il comportamento corretto
4. Aggiornare la documentazione del codice con annotazioni PHPDoc complete
5. Valutare l'utilizzo di classi di tipo dedicate (DTO) per strutture dati complesse
6. Seguire le linee guida di tipizzazione nel documento 'Regole Windsurf per base_predict_fila3_mono'
