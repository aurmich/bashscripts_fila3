# Analisi PHPStan - Modulo Blog - Livello max

[⬅️ Torna alla Roadmap del modulo](../roadmap.md)


Data analisi: 2025-04-11 13:00:57

## Risultato: ERRORI

Rilevati 341 errori a livello max.

### Dettaglio errori
```
Note: Using configuration file /var/www/html/_bases/base_predict_fila3_mono/laravel/phpstan.neon.
   0/531 [░░░░░░░░░░░░░░░░░░░░░░░░░░░░]   0%[1G[2K  20/531 [▓░░░░░░░░░░░░░░░░░░░░░░░░░░░]   3%[1G[2K 160/531 [▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░░░░]  30%[1G[2K 180/531 [▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░░░]  33%[1G[2K 280/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░]  52%[1G[2K 300/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░]  56%[1G[2K 340/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░]  64%[1G[2K 360/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░]  67%[1G[2K 380/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░]  71%[1G[2K 420/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░]  79%[1G[2K 440/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░]  82%[1G[2K 460/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░]  86%[1G[2K 480/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░]  90%[1G[2K 511/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░]  96%[1G[2K 531/531 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%

 ------ ----------------------------------------------------------------------- 
  Line   Actions/Article/ImportArticlesFromByJsonTextAction.php                 
 ------ ----------------------------------------------------------------------- 
  :26    Cannot access offset 'bet_end_date' on mixed.                          
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :30    Cannot access offset 'event_start_date' on mixed.                      
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :34    Cannot access offset 'event_end_date' on mixed.                        
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :40    Argument of an invalid type mixed supplied for foreach, only           
         iterables are supported.                                               
         🪪  foreach.nonIterable                                                
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :40    Cannot access offset 'category' on mixed.                              
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :44    Cannot access offset 'title' on mixed.                                 
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :45    Cannot access offset 'slug' on mixed.                                  
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :55    Cannot access offset 'slug' on mixed.                                  
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :60    Cannot access offset 'title' on mixed.                                 
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :61    Cannot access offset 'slug' on mixed.                                  
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :62    Cannot access offset 'status' on mixed.                                
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :63    Cannot access offset 'status_display' on mixed.                        
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :67    Cannot access offset 'is_wagerable' on mixed.                          
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :68    Cannot access offset 'brier_score' on mixed.                           
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :69    Cannot access offset 'brier_score_play_money' on mixed.                
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :70    Cannot access offset 'brier_score_real_money' on mixed.                
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :71    Cannot access offset 'wagers_count' on mixed.                          
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :72    Cannot access offset 'wagers_count_canonical' on mixed.                
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :73    Cannot access offset 'wagers_count_total' on mixed.                    
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :74    Cannot access offset 'wagers' on mixed.                                
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :75    Cannot access offset 'volume_play_money' on mixed.                     
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :76    Cannot access offset 'volume_real_money' on mixed.                     
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :77    Cannot access offset 'volume_real_money' on mixed.                     
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :86    Argument of an invalid type mixed supplied for foreach, only           
         iterables are supported.                                               
         🪪  foreach.nonIterable                                                
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :86    Cannot access offset 'outcomes' on mixed.                              
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :88    Cannot access offset 'title' on mixed.                                 
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :91    Cannot access offset 'title' on mixed.                                 
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :92    Cannot access offset 'disabled' on mixed.                              
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :96    Cannot access offset 'thumbnail_2x' on mixed.                          
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
  :96    Parameter #1 $url of method                                            
         Modules\Rating\Models\Rating::addMediaFromUrl() expects string, mixed  
         given.                                                                 
         🪪  argument.type                                                      
         ✏️  Actions/Article/ImportArticlesFromByJsonTextAction.php             
 ------ ----------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------- 
  Line   Actions/Article/TranslateContentAction.php                             
 ------ ----------------------------------------------------------------------- 
  :18    Parameter #2 $class of static method                                   
         Webmozart\Assert\Assert::isInstanceOf() expects class-string<object>,  
         mixed given.                                                           
         🪪  argument.type                                                      
         ✏️  Actions/Article/TranslateContentAction.php                         
  :27    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
  :28    Cannot access offset 'it' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
  :28    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
  :40    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
  :41    Cannot access offset 'it' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
  :41    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
  :53    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
  :54    Cannot access offset 'it' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
  :54    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  Actions/Article/TranslateContentAction.php                         
 ------ ----------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------- 
  Line   Actions/Banner/ImportBannerFromByJsonTextAction.php                  
 ------ --------------------------------------------------------------------- 
  :25    Cannot access offset 'start_date' on mixed.                          
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :29    Cannot access offset 'end_date' on mixed.                            
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :34    Cannot access offset 'category_dict' on mixed.                       
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :37    Cannot access offset 'title' on mixed.                               
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :38    Cannot access offset 'slug' on mixed.                                
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :46    Cannot access offset 'title' on mixed.                               
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :47    Cannot access offset 'action_text' on mixed.                         
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :50    Cannot access offset 'title' on mixed.                               
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :51    Cannot access offset 'short_description' on mixed.                   
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :52    Cannot access offset 'action_text' on mixed.                         
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :53    Cannot access offset 'link' on mixed.                                
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :56    Cannot access offset 'hot_topic' on mixed.                           
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :57    Cannot access offset 'open_markets_count' on mixed.                  
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :58    Cannot access offset 'landing_banner' on mixed.                      
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :63    Cannot access offset 'desktop_thumbnail' on mixed.                   
         🪪  offsetAccess.nonOffsetAccessible                                 
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
  :63    Parameter #1 $url of method                                          
         Modules\Blog\Models\Banner::addMediaFromUrl() expects string, mixed  
         given.                                                               
         🪪  argument.type                                                    
         ✏️  Actions/Banner/ImportBannerFromByJsonTextAction.php              
 ------ --------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------- 
  Line   Actions/ParentChilds/GetTreeOptions.php                              
 ------ --------------------------------------------------------------------- 
  :19    Argument of an invalid type mixed supplied for foreach, only         
         iterables are supported.                                             
         🪪  foreach.nonIterable                                              
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :20    Cannot access property $id on mixed.                                 
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :20    Cannot access property $title on mixed.                              
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :21    Argument of an invalid type mixed supplied for foreach, only         
         iterables are supported.                                             
         🪪  foreach.nonIterable                                              
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :21    Cannot access property $children on mixed.                           
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :22    Binary operation "." between '--------->' and mixed results in an    
         error.                                                               
         🪪  binaryOp.invalid                                                 
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :22    Cannot access property $id on mixed.                                 
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :22    Cannot access property $title on mixed.                              
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :23    Argument of an invalid type mixed supplied for foreach, only         
         iterables are supported.                                             
         🪪  foreach.nonIterable                                              
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :23    Cannot access property $children on mixed.                           
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :24    Binary operation "." between '----------------->' and mixed results  
         in an error.                                                         
         🪪  binaryOp.invalid                                                 
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :24    Cannot access property $id on mixed.                                 
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :24    Cannot access property $title on mixed.                              
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :25    Argument of an invalid type mixed supplied for foreach, only         
         iterables are supported.                                             
         🪪  foreach.nonIterable                                              
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :25    Cannot access property $children on mixed.                           
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :26    Binary operation "." between '-------------------…' and mixed        
         results in an error.                                                 
         🪪  binaryOp.invalid                                                 
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :26    Cannot access property $id on mixed.                                 
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
  :26    Cannot access property $title on mixed.                              
         🪪  property.nonObject                                               
         ✏️  Actions/ParentChilds/GetTreeOptions.php                          
 ------ --------------------------------------------------------------------- 

 ------ -------------------------------------------- 
  Line   Console/Commands/ShowArticleCommand.php     
 ------ -------------------------------------------- 
  :45    Cannot call method where() on mixed.        
         🪪  method.nonObject                        
         ✏️  Console/Commands/ShowArticleCommand.php  
  :45    Cannot call method where() on mixed.        
         🪪  method.nonObject                        
         ✏️  Console/Commands/ShowArticleCommand.php  
  :50    Cannot call method where() on mixed.        
         🪪  method.nonObject                        
         ✏️  Console/Commands/ShowArticleCommand.php  
  :50    Cannot call method whereIn() on mixed.      
         🪪  method.nonObject                        
         ✏️  Console/Commands/ShowArticleCommand.php  
  :62    Cannot call method where() on mixed.        
         🪪  method.nonObject                        
         ✏️  Console/Commands/ShowArticleCommand.php  
  :62    Cannot call method where() on mixed.        
         🪪  method.nonObject                        
         ✏️  Console/Commands/ShowArticleCommand.php  
 ------ -------------------------------------------- 

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

 ------ ------------------------------------------------------------------------------- 
  Line   Database/Seeders/ArticleSeeder.php                                             
 ------ ------------------------------------------------------------------------------- 
  :31    Cannot access offset 'name' on mixed.                                          
         🪪  offsetAccess.nonOffsetAccessible                                           
         ✏️  Database/Seeders/ArticleSeeder.php                                         
  :32    Cannot access offset 'name' on mixed.                                          
         🪪  offsetAccess.nonOffsetAccessible                                           
         ✏️  Database/Seeders/ArticleSeeder.php                                         
  :32    Parameter #1 $title of static method Illuminate\Support\Str::slug()            
         expects string, mixed given.                                                   
         🪪  argument.type                                                              
         ✏️  Database/Seeders/ArticleSeeder.php                                         
  :66    Cannot access offset 'image' on mixed.                                         
         🪪  offsetAccess.nonOffsetAccessible                                           
         ✏️  Database/Seeders/ArticleSeeder.php                                         
  :71    Cannot call method create() on mixed.                                          
         🪪  method.nonObject                                                           
         ✏️  Database/Seeders/ArticleSeeder.php                                         
  :71    Method Modules\Blog\Database\Seeders\ArticleSeeder::createArticle()            
         should return                                                                  
         Illuminate\Database\Eloquent\Collection&iterable<Modules\Blog\Models\Article>  
         but returns mixed.                                                             
         🪪  return.type                                                                
         ✏️  Database/Seeders/ArticleSeeder.php                                         
 ------ ------------------------------------------------------------------------------- 

 ------ --------------------------------------- 
  Line   Database/Seeders/SiteSeeder.php        
 ------ --------------------------------------- 
  :15    Cannot call method create() on mixed.  
         🪪  method.nonObject                   
         ✏️  Database/Seeders/SiteSeeder.php    
  :20    Cannot call method create() on mixed.  
         🪪  method.nonObject                   
         ✏️  Database/Seeders/SiteSeeder.php    
 ------ --------------------------------------- 

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

 ------ ----------------------------------------------------------------------------------------- 
  Line   Filament/Resources/ArticleResource.php                                                   
 ------ ----------------------------------------------------------------------------------------- 
  :22    Non-abstract class Modules\Blog\Filament\Resources\ArticleResource                       
         contains abstract method getFormSchema() from class                                      
         Modules\Xot\Filament\Resources\XotBaseResource.                                          
         ✏️  Filament/Resources/ArticleResource.php                                               
  :45    Trying to invoke mixed but it's not a callable.                                          
         🪪  callable.nonCallable                                                                 
         ✏️  Filament/Resources/ArticleResource.php                                               
  :48    Parameter #1 $title of static method Illuminate\Support\Str::slug()                      
         expects string, mixed given.                                                             
         🪪  argument.type                                                                        
         ✏️  Filament/Resources/ArticleResource.php                                               
  :48    Trying to invoke mixed but it's not a callable.                                          
         🪪  callable.nonCallable                                                                 
         ✏️  Filament/Resources/ArticleResource.php                                               
  :84    Parameter #1 $options of method                                                          
         Filament\Forms\Components\Select::options() expects                                      
         array<array<string>|string>|Closure|Illuminate\Contracts\Support\Arrayable|string|null,  
         array given.                                                                             
         🪪  argument.type                                                                        
         ✏️  Filament/Resources/ArticleResource.php                                               
  :85    Parameter #1 $schema of method                                                           
         Filament\Forms\Components\Select::createOptionForm() expects                             
         array<Filament\Forms\Components\Component>|Closure|null, array given.                    
         🪪  argument.type                                                                        
         ✏️  Filament/Resources/ArticleResource.php                                               
  :168   Method Modules\Blog\Filament\Resources\ArticleResource::form()                           
         overrides final method                                                                   
         Modules\Xot\Filament\Resources\XotBaseResource::form().                                  
         ✏️  Filament/Resources/ArticleResource.php                                               
  :170   Parameter #1 $components of method                                                       
         Filament\Forms\ComponentContainer::schema() expects                                      
         array<Filament\Forms\Components\Component>|Closure, array given.                         
         🪪  argument.type                                                                        
         ✏️  Filament/Resources/ArticleResource.php                                               
  :182   Method Modules\Blog\Filament\Resources\ArticleResource::getPages()                       
         should return array<string,                                                              
         Filament\Resources\Pages\PageRegistration> but returns array<string,                     
         mixed>.                                                                                  
         🪪  return.type                                                                          
         ✏️  Filament/Resources/ArticleResource.php                                               
  :183   Call to an undefined static method                                                       
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::route().             
         🪪  staticMethod.notFound                                                                
         ✏️  Filament/Resources/ArticleResource.php                                               
 ------ ----------------------------------------------------------------------------------------- 

 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
  Line   Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                          
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 
  :21    Class                                                                                                                                              
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles                                                                                 
         extends unknown class Modules\Xot\Filament\Pages\XotBaseListRecords.                                                                               
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols                                                                                
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :118   Parameter #1 $options of method                                                                                                                    
         Filament\Tables\Filters\SelectFilter::options() expects                                                                                            
         array<array<string>|string>|class-string|Closure|Illuminate\Contracts\Support\Arrayable|null,                                                      
         array given.                                                                                                                                       
         🪪  argument.type                                                                                                                                  
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :126   Access to an undefined property                                                                                                                    
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::$layoutView.                                                                   
         🪪  property.notFound                                                                                                                              
         💡 Learn more:                                                                                                                                     
            https://phpstan.org/blog/solving-phpstan-access-to-undefined-property                                                                           
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :126   Cannot call method getTableColumns() on mixed.                                                                                                     
         🪪  method.nonObject                                                                                                                               
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :126   Parameter #1 $components of method Filament\Tables\Table::columns()                                                                                
         expects                                                                                                                                            
         array<Filament\Tables\Columns\Column|Filament\Tables\Columns\ColumnGroup|Filament\Tables\Columns\Layout\Component>,                                
         mixed given.                                                                                                                                       
         🪪  argument.type                                                                                                                                  
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :127   Access to an undefined property                                                                                                                    
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::$layoutView.                                                                   
         🪪  property.notFound                                                                                                                              
         💡 Learn more:                                                                                                                                     
            https://phpstan.org/blog/solving-phpstan-access-to-undefined-property                                                                           
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :127   Cannot call method getTableContentGrid() on mixed.                                                                                                 
         🪪  method.nonObject                                                                                                                               
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :127   Parameter #1 $grid of method Filament\Tables\Table::contentGrid()                                                                                  
         expects array<string, int|null>|Closure|null, mixed given.                                                                                         
         🪪  argument.type                                                                                                                                  
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :128   Call to an undefined method                                                                                                                        
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::getTableHeaderActions().                                                       
         🪪  method.notFound                                                                                                                                
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :128   Parameter #1 $actions of method                                                                                                                    
         Filament\Tables\Table::headerActions() expects                                                                                                     
         array<Filament\Tables\Actions\Action|Filament\Tables\Actions\ActionGroup|Filament\Tables\Actions\BulkAction>|Filament\Tables\Actions\ActionGroup,  
         mixed given.                                                                                                                                       
         🪪  argument.type                                                                                                                                  
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :129   Parameter #1 $filters of method Filament\Tables\Table::filters()                                                                                   
         expects array<Filament\Tables\Filters\BaseFilter>, array given.                                                                                    
         🪪  argument.type                                                                                                                                  
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :130   Parameter #1 $actions of method Filament\Tables\Table::bulkActions()                                                                               
         expects                                                                                                                                            
         array<Filament\Tables\Actions\ActionGroup|Filament\Tables\Actions\BulkAction>|Filament\Tables\Actions\ActionGroup,                                 
         array given.                                                                                                                                       
         🪪  argument.type                                                                                                                                  
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :132   Parameter #1 $actions of method Filament\Tables\Table::actions()                                                                                   
         expects                                                                                                                                            
         array<Filament\Tables\Actions\Action|Filament\Tables\Actions\ActionGroup>|Filament\Tables\Actions\ActionGroup,                                     
         array given.                                                                                                                                       
         🪪  argument.type                                                                                                                                  
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
  :156   Parameter #1 $json_text of method                                                                                                                  
         Modules\Blog\Actions\Article\ImportArticlesFromByJsonTextAction::execute()                                                                         
         expects string, mixed given.                                                                                                                       
         🪪  argument.type                                                                                                                                  
         ✏️  Filament/Resources/ArticleResource/Pages/ListArticles.php                                                                                      
 ------ --------------------------------------------------------------------------------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------- 
  Line   Filament/Resources/ArticleResource/Pages/ViewArticle.php     
 ------ ------------------------------------------------------------- 
  :55    Cannot call method update() on mixed.                        
         🪪  method.nonObject                                         
         ✏️  Filament/Resources/ArticleResource/Pages/ViewArticle.php  
 ------ ------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------------- 
  Line   Filament/Resources/BannerResource.php                                                    
 ------ ----------------------------------------------------------------------------------------- 
  :19    Non-abstract class Modules\Blog\Filament\Resources\BannerResource                        
         contains abstract method getFormSchema() from class                                      
         Modules\Xot\Filament\Resources\XotBaseResource.                                          
         ✏️  Filament/Resources/BannerResource.php                                                
  :31    Method Modules\Blog\Filament\Resources\BannerResource::form()                            
         overrides final method                                                                   
         Modules\Xot\Filament\Resources\XotBaseResource::form().                                  
         ✏️  Filament/Resources/BannerResource.php                                                
  :48    Parameter #1 $options of method                                                          
         Filament\Forms\Components\Select::options() expects                                      
         array<array<string>|string>|Closure|Illuminate\Contracts\Support\Arrayable|string|null,  
         array given.                                                                             
         🪪  argument.type                                                                        
         ✏️  Filament/Resources/BannerResource.php                                                
  :125   Method Modules\Blog\Filament\Resources\BannerResource::getPages()                        
         should return array<string,                                                              
         Filament\Resources\Pages\PageRegistration> but returns array<string,                     
         mixed>.                                                                                  
         🪪  return.type                                                                          
         ✏️  Filament/Resources/BannerResource.php                                                
  :126   Call to an undefined static method                                                       
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::route().               
         🪪  staticMethod.notFound                                                                
         ✏️  Filament/Resources/BannerResource.php                                                
 ------ ----------------------------------------------------------------------------------------- 

 ------ ---------------------------------------------------------------------------- 
  Line   Filament/Resources/BannerResource/Pages/ListBanners.php                     
 ------ ---------------------------------------------------------------------------- 
  :21    Class                                                                       
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners            
         extends unknown class Modules\Xot\Filament\Pages\XotBaseListRecords.        
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols         
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :44    Parameter #1 $json_text of method                                           
         Modules\Blog\Actions\Banner\ImportBannerFromByJsonTextAction::execute()     
         expects string, mixed given.                                                
         🪪  argument.type                                                           
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :52    Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::trans().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :52    Parameter #1 $label of method Filament\Tables\Columns\Column::label()       
         expects Closure|Illuminate\Contracts\Support\Htmlable|string|null,          
         mixed given.                                                                
         🪪  argument.type                                                           
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :56    Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::trans().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :56    Parameter #1 $label of method Filament\Tables\Columns\Column::label()       
         expects Closure|Illuminate\Contracts\Support\Htmlable|string|null,          
         mixed given.                                                                
         🪪  argument.type                                                           
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :60    Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::trans().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :60    Parameter #1 $label of method Filament\Tables\Columns\Column::label()       
         expects Closure|Illuminate\Contracts\Support\Htmlable|string|null,          
         mixed given.                                                                
         🪪  argument.type                                                           
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :64    Call to an undefined static method                                          
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::trans().  
         🪪  staticMethod.notFound                                                   
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
  :64    Parameter #1 $label of method Filament\Tables\Columns\Column::label()       
         expects Closure|Illuminate\Contracts\Support\Htmlable|string|null,          
         mixed given.                                                                
         🪪  argument.type                                                           
         ✏️  Filament/Resources/BannerResource/Pages/ListBanners.php                 
 ------ ---------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------------- 
  Line   Filament/Resources/CategoryResource.php                                                  
 ------ ----------------------------------------------------------------------------------------- 
  :17    Non-abstract class Modules\Blog\Filament\Resources\CategoryResource                      
         contains abstract method getFormSchema() from class                                      
         Modules\Xot\Filament\Resources\XotBaseResource.                                          
         ✏️  Filament/Resources/CategoryResource.php                                              
  :41    Parameter #1 $title of static method Illuminate\Support\Str::slug()                      
         expects string, mixed given.                                                             
         🪪  argument.type                                                                        
         ✏️  Filament/Resources/CategoryResource.php                                              
  :51    Parameter #1 $options of method                                                          
         Filament\Forms\Components\Select::options() expects                                      
         array<array<string>|string>|Closure|Illuminate\Contracts\Support\Arrayable|string|null,  
         array given.                                                                             
         🪪  argument.type                                                                        
         ✏️  Filament/Resources/CategoryResource.php                                              
  :76    Method Modules\Blog\Filament\Resources\CategoryResource::form()                          
         overrides final method                                                                   
         Modules\Xot\Filament\Resources\XotBaseResource::form().                                  
         ✏️  Filament/Resources/CategoryResource.php                                              
  :79    Parameter #1 $components of method                                                       
         Filament\Forms\ComponentContainer::schema() expects                                      
         array<Filament\Forms\Components\Component>|Closure, array given.                         
         🪪  argument.type                                                                        
         ✏️  Filament/Resources/CategoryResource.php                                              
  :84    Method Modules\Blog\Filament\Resources\CategoryResource::getPages()                      
         should return array<string,                                                              
         Filament\Resources\Pages\PageRegistration> but returns array<string,                     
         mixed>.                                                                                  
         🪪  return.type                                                                          
         ✏️  Filament/Resources/CategoryResource.php                                              
  :86    Call to an undefined static method                                                       
         Modules\Blog\Filament\Resources\CategoryResource\Pages\ListCategories::route().          
         🪪  staticMethod.notFound                                                                
         ✏️  Filament/Resources/CategoryResource.php                                              
 ------ ----------------------------------------------------------------------------------------- 

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
  :83    Method Modules\Blog\Filament\Resources\TextWidgetResource::getPages()               
         should return array<string,                                                         
         Filament\Resources\Pages\PageRegistration> but returns array<string,                
         mixed>.                                                                             
         🪪  return.type                                                                     
         ✏️  Filament/Resources/TextWidgetResource.php                                       
  :84    Call to an undefined static method                                                  
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\ListTextWidgets::route().  
         🪪  staticMethod.notFound                                                           
         ✏️  Filament/Resources/TextWidgetResource.php                                       
 ------ ------------------------------------------------------------------------------------ 

 ------ --------------------------------------------------------------------------------------------- 
  Line   Filament/Resources/TextWidgetResource/Pages/CreateTextWidget.php                             
 ------ --------------------------------------------------------------------------------------------- 
  :16    Method                                                                                       
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\CreateTextWidget::getRedirectUrl()  
         should return string but returns mixed.                                                      
         🪪  return.type                                                                              
         ✏️  Filament/Resources/TextWidgetResource/Pages/CreateTextWidget.php                         
 ------ --------------------------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------------------------------- 
  Line   Filament/Resources/TextWidgetResource/Pages/EditTextWidget.php                             
 ------ ------------------------------------------------------------------------------------------- 
  :25    Method                                                                                     
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\EditTextWidget::getRedirectUrl()  
         should return string but returns mixed.                                                    
         🪪  return.type                                                                            
         ✏️  Filament/Resources/TextWidgetResource/Pages/EditTextWidget.php                         
 ------ ------------------------------------------------------------------------------------------- 

 ------ -------------------------------------------------------------------------- 
  Line   Filament/Resources/TextWidgetResource/Pages/ListTextWidgets.php           
 ------ -------------------------------------------------------------------------- 
  :11    Class                                                                     
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\ListTextWidgets  
         extends unknown class Modules\Xot\Filament\Pages\XotBaseListRecords.      
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols       
         ✏️  Filament/Resources/TextWidgetResource/Pages/ListTextWidgets.php       
 ------ -------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------ 
  Line   Http/Livewire/Profile.php                                         
 ------ ------------------------------------------------------------------ 
  :69    Parameter #1 $state of method                                     
         Filament\Forms\ComponentContainer::fill() expects array<string,   
         mixed>|null, array<mixed, mixed> given.                           
         🪪  argument.type                                                 
         ✏️  Http/Livewire/Profile.php                                     
  :100   Parameter #1 $label of method                                     
         Filament\Forms\Components\Component::label() expects              
         Closure|Illuminate\Contracts\Support\Htmlable|string|null, mixed  
         given.                                                            
         🪪  argument.type                                                 
         ✏️  Http/Livewire/Profile.php                                     
 ------ ------------------------------------------------------------------ 

 ------ --------------------------------------------------------------------- 
  Line   Http/Livewire/Profile/Setting.php                                    
 ------ --------------------------------------------------------------------- 
  :48    Parameter #1 $state of method                                        
         Filament\Forms\ComponentContainer::fill() expects array<string,      
         mixed>|null, array given.                                            
         🪪  argument.type                                                    
         ✏️  Http/Livewire/Profile/Setting.php                                
  :144   Parameter #1 $value of function bcrypt expects string, mixed given.  
         🪪  argument.type                                                    
         ✏️  Http/Livewire/Profile/Setting.php                                
 ------ --------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------- 
  Line   Models/Article.php                                                                 
 ------ ----------------------------------------------------------------------------------- 
  :279   Call to static method make() on an unknown class                                   
         Modules\Blog\Models\XotData.                                                       
         🪪  class.notFound                                                                 
         💡 Learn more at https://phpstan.org/user-guide/discovering-symbols                
         ✏️  Models/Article.php                                                             
  :279   Cannot call method getUserClass() on mixed.                                        
         🪪  method.nonObject                                                               
         ✏️  Models/Article.php                                                             
  :281   Parameter #1 $related of method                                                    
         Modules\Blog\Models\Article::belongsTo() expects                                   
         class-string<Illuminate\Database\Eloquent\Model>, mixed given.                     
         🪪  argument.type                                                                  
         ✏️  Models/Article.php                                                             
  :281   Unable to resolve the template type TRelatedModel in call to method                
         Modules\Blog\Models\Article::belongsTo()                                           
         🪪  argument.templateType                                                          
         💡 See:                                                                            
            https://phpstan.org/blog/solving-phpstan-error-unable-to-resolve-template-type  
         ✏️  Models/Article.php                                                             
  :333   Cannot cast mixed to string.                                                       
         🪪  cast.string                                                                    
         ✏️  Models/Article.php                                                             
  :388   Anonymous function should return string but returns mixed.                         
         🪪  return.type                                                                    
         ✏️  Models/Article.php                                                             
  :388   Cannot access offset 'main_image_upload' on mixed.                                 
         🪪  offsetAccess.nonOffsetAccessible                                               
         ✏️  Models/Article.php                                                             
  :388   Cannot access offset 'main_image_url' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                               
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

 ------ --------------------------------------------------------------------- 
  Line   View/Composers/ThemeComposer.php                                     
 ------ --------------------------------------------------------------------- 
  :53    Method Modules\Blog\View\Composers\ThemeComposer::getArticlesType()  
         should return Illuminate\Support\Collection but returns mixed.       
         🪪  return.type                                                      
         ✏️  View/Composers/ThemeComposer.php                                 
  :178   Method Modules\Blog\View\Composers\ThemeComposer::getMethodData()    
         should return array|Illuminate\Contracts\Pagination\Paginator but    
         returns mixed.                                                       
         🪪  return.type                                                      
         ✏️  View/Composers/ThemeComposer.php                                 
  :333   Cannot call method withCount() on mixed.                             
         🪪  method.nonObject                                                 
         ✏️  View/Composers/ThemeComposer.php                                 
 ------ --------------------------------------------------------------------- 

 ------ --------------------------------------------------------------- 
  Line   app/Actions/Article/ImportArticlesFromByJsonTextAction.php     
 ------ --------------------------------------------------------------- 
  :34    Parameter #1 $data of static method                            
         Modules\Blog\DataObjects\ArticleData::fromArray() expects      
         array<string, mixed>, array given.                             
         🪪  argument.type                                              
         ✏️  app/Actions/Article/ImportArticlesFromByJsonTextAction.php  
  :84    Cannot cast mixed to string.                                   
         🪪  cast.string                                                
         ✏️  app/Actions/Article/ImportArticlesFromByJsonTextAction.php  
 ------ --------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------- 
  Line   app/Actions/Article/TranslateContentAction.php                         
 ------ ----------------------------------------------------------------------- 
  :19    Parameter #2 $class of static method                                   
         Webmozart\Assert\Assert::isInstanceOf() expects class-string<object>,  
         mixed given.                                                           
         🪪  argument.type                                                      
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :28    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :29    Cannot access offset 'it' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :29    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :41    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :42    Cannot access offset 'it' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :42    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :54    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :55    Cannot access offset 'it' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
  :55    Cannot access offset mixed on mixed.                                   
         🪪  offsetAccess.nonOffsetAccessible                                   
         ✏️  app/Actions/Article/TranslateContentAction.php                     
 ------ ----------------------------------------------------------------------- 

 ------ -------------------------------------------------------------------------- 
  Line   app/Actions/Banner/ImportBannerFromByJsonTextAction.php                   
 ------ -------------------------------------------------------------------------- 
  :25    Cannot access offset 'start_date' on mixed.                               
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :29    Cannot access offset 'end_date' on mixed.                                 
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :34    Cannot access offset 'category_dict' on mixed.                            
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :37    Cannot access offset 'title' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :38    Cannot access offset 'slug' on mixed.                                     
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :46    Cannot access offset 'title' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :47    Cannot access offset 'action_text' on mixed.                              
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :50    Cannot access offset 'title' on mixed.                                    
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :51    Cannot access offset 'short_description' on mixed.                        
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :52    Cannot access offset 'action_text' on mixed.                              
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :53    Cannot access offset 'link' on mixed.                                     
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :56    Cannot access offset 'hot_topic' on mixed.                                
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :57    Cannot access offset 'open_markets_count' on mixed.                       
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :58    Cannot access offset 'landing_banner' on mixed.                           
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :63    Cannot access offset 'desktop_thumbnail' on mixed.                        
         🪪  offsetAccess.nonOffsetAccessible                                      
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :63    Parameter #1 $url of method                                               
         Modules\Blog\Models\Banner::addMediaFromUrl() expects string, mixed       
         given.                                                                    
         🪪  argument.type                                                         
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :75    Parameter #1 $time of static method Carbon\Carbon::parse() expects        
         Carbon\Month|Carbon\WeekDay|DateTimeInterface|float|int|string|null,      
         mixed given.                                                              
         🪪  argument.type                                                         
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :75    Property Modules\Blog\Models\Banner::$start_date                          
         (Illuminate\Support\Carbon|null) does not accept Carbon\Carbon.           
         🪪  assign.propertyType                                                   
         ✏️  app/Actions/Banner/ImportBannerFromByJsonTextAction.php               
  :79    Parameter #1 $time of static method Carbon\Carbon::parse() expects        
         Carbon\Month|Carbon\WeekDay|DateTimeInterface|float|int|string|null,      
         mixed given.                                                              
         🪪  argument.type                                                         
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
  :87    Property Modules\Blog\Models\Banner::$title (string|null) does not        
         accept mixed.                                                             
         🪪  assign.propertyType                                                   
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

 ------ --------------------------------------------------------------------- 
  Line   app/Actions/ParentChilds/GetTreeOptions.php                          
 ------ --------------------------------------------------------------------- 
  :17    Cannot call method get() on mixed.                                   
         🪪  method.nonObject                                                 
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :17    Cannot call method toTree() on mixed.                                
         🪪  method.nonObject                                                 
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :19    Argument of an invalid type mixed supplied for foreach, only         
         iterables are supported.                                             
         🪪  foreach.nonIterable                                              
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :20    Cannot access property $id on mixed.                                 
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :20    Cannot access property $title on mixed.                              
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :21    Argument of an invalid type mixed supplied for foreach, only         
         iterables are supported.                                             
         🪪  foreach.nonIterable                                              
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :21    Cannot access property $children on mixed.                           
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :22    Binary operation "." between '--------->' and mixed results in an    
         error.                                                               
         🪪  binaryOp.invalid                                                 
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :22    Cannot access property $id on mixed.                                 
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :22    Cannot access property $title on mixed.                              
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :23    Argument of an invalid type mixed supplied for foreach, only         
         iterables are supported.                                             
         🪪  foreach.nonIterable                                              
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :23    Cannot access property $children on mixed.                           
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :24    Binary operation "." between '----------------->' and mixed results  
         in an error.                                                         
         🪪  binaryOp.invalid                                                 
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :24    Cannot access property $id on mixed.                                 
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :24    Cannot access property $title on mixed.                              
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :25    Argument of an invalid type mixed supplied for foreach, only         
         iterables are supported.                                             
         🪪  foreach.nonIterable                                              
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :25    Cannot access property $children on mixed.                           
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :26    Binary operation "." between '-------------------…' and mixed        
         results in an error.                                                 
         🪪  binaryOp.invalid                                                 
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :26    Cannot access property $id on mixed.                                 
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
  :26    Cannot access property $title on mixed.                              
         🪪  property.nonObject                                               
         ✏️  app/Actions/ParentChilds/GetTreeOptions.php                      
 ------ --------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------ 
  Line   app/Console/Commands/ShowArticleCommand.php                       
 ------ ------------------------------------------------------------------ 
  :70    Binary operation "*" between mixed and 100 results in an error.   
         🪪  binaryOp.invalid                                              
         ✏️  app/Console/Commands/ShowArticleCommand.php                   
  :70    Binary operation "/" between (float|int) and mixed results in an  
         error.                                                            
         🪪  binaryOp.invalid                                              
         ✏️  app/Console/Commands/ShowArticleCommand.php                   
  :76    Cannot access property $is_winner on mixed.                       
         🪪  property.nonObject                                            
         ✏️  app/Console/Commands/ShowArticleCommand.php                   
 ------ ------------------------------------------------------------------ 

 ------ ----------------------------------------------------------------------- 
  Line   app/DataObjects/ArticleData.php                                        
 ------ ----------------------------------------------------------------------- 
  :62    Parameter #1 $time of static method Carbon\Carbon::parse() expects     
         Carbon\Month|Carbon\WeekDay|DateTimeInterface|float|int|string|null,   
         mixed given.                                                           
         🪪  argument.type                                                      
         ✏️  app/DataObjects/ArticleData.php                                    
  :63    Parameter #1 $time of static method Carbon\Carbon::parse() expects     
         Carbon\Month|Carbon\WeekDay|DateTimeInterface|float|int|string|null,   
         mixed given.                                                           
         🪪  argument.type                                                      
         ✏️  app/DataObjects/ArticleData.php                                    
  :64    Parameter #1 $time of static method Carbon\Carbon::parse() expects     
         Carbon\Month|Carbon\WeekDay|DateTimeInterface|float|int|string|null,   
         mixed given.                                                           
         🪪  argument.type                                                      
         ✏️  app/DataObjects/ArticleData.php                                    
  :65    Parameter $category of class Modules\Blog\DataObjects\ArticleData      
         constructor expects array<int, array<string, mixed>>, mixed given.     
         🪪  argument.type                                                      
         ✏️  app/DataObjects/ArticleData.php                                    
  :66    Cannot cast mixed to string.                                           
         🪪  cast.string                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :67    Cannot cast mixed to string.                                           
         🪪  cast.string                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :68    Cannot cast mixed to string.                                           
         🪪  cast.string                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :69    Cannot cast mixed to string.                                           
         🪪  cast.string                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :71    Cannot cast mixed to float.                                            
         🪪  cast.double                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :72    Cannot cast mixed to float.                                            
         🪪  cast.double                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :73    Cannot cast mixed to float.                                            
         🪪  cast.double                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :74    Cannot cast mixed to int.                                              
         🪪  cast.int                                                           
         ✏️  app/DataObjects/ArticleData.php                                    
  :75    Cannot cast mixed to int.                                              
         🪪  cast.int                                                           
         ✏️  app/DataObjects/ArticleData.php                                    
  :76    Cannot cast mixed to int.                                              
         🪪  cast.int                                                           
         ✏️  app/DataObjects/ArticleData.php                                    
  :77    Parameter $wagers of class Modules\Blog\DataObjects\ArticleData        
         constructor expects array<int, array<string, mixed>>, mixed given.     
         🪪  argument.type                                                      
         ✏️  app/DataObjects/ArticleData.php                                    
  :78    Cannot cast mixed to float.                                            
         🪪  cast.double                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :79    Cannot cast mixed to float.                                            
         🪪  cast.double                                                        
         ✏️  app/DataObjects/ArticleData.php                                    
  :80    Parameter $outcomes of class Modules\Blog\DataObjects\ArticleData      
         constructor expects array<int, array<string, mixed>>, mixed given.     
         🪪  argument.type                                                      
         ✏️  app/DataObjects/ArticleData.php                                    
  :81    Parameter $thumbnail_2x of class Modules\Blog\DataObjects\ArticleData  
         constructor expects string|null, mixed given.                          
         🪪  argument.type                                                      
         ✏️  app/DataObjects/ArticleData.php                                    
 ------ ----------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------- 
  Line   app/Datas/ArticleData.php                                                          
 ------ ----------------------------------------------------------------------------------- 
  :164   Cannot cast mixed to string.                                                       
         🪪  cast.string                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :165   Cannot cast mixed to string.                                                       
         🪪  cast.string                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :166   Parameter $title of class Modules\Blog\Datas\ArticleData constructor               
         expects array|string, mixed given.                                                 
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :167   Cannot cast mixed to string.                                                       
         🪪  cast.string                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :168   Cannot cast mixed to int.                                                          
         🪪  cast.int                                                                       
         ✏️  app/Datas/ArticleData.php                                                      
  :169   Cannot cast mixed to string.                                                       
         🪪  cast.string                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :173   Parameter $published_at of class Modules\Blog\Datas\ArticleData                    
         constructor expects string|null, mixed given.                                      
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :177   Parameter $content_blocks of class Modules\Blog\Datas\ArticleData                  
         constructor expects array|null, mixed given.                                       
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :178   Parameter $sidebar_blocks of class Modules\Blog\Datas\ArticleData                  
         constructor expects array|null, mixed given.                                       
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :179   Parameter $footer_blocks of class Modules\Blog\Datas\ArticleData                   
         constructor expects array|null, mixed given.                                       
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :180   Parameter #1 $value of function collect expects                                    
         Illuminate\Contracts\Support\Arrayable<(int|string),                               
         mixed>|iterable<(int|string), mixed>|null, mixed given.                            
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
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
  :181   Parameter $url of class Modules\Blog\Datas\ArticleData constructor                 
         expects string|null, mixed given.                                                  
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :182   Parameter $ratings of class Modules\Blog\Datas\ArticleData                         
         constructor expects array|null, mixed given.                                       
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :184   Parameter $closed_at of class Modules\Blog\Datas\ArticleData                       
         constructor expects string|null, mixed given.                                      
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :188   Parameter $closed_at_date of class Modules\Blog\Datas\ArticleData                  
         constructor expects string|null, mixed given.                                      
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :189   Parameter $time_left_for_humans of class                                           
         Modules\Blog\Datas\ArticleData constructor expects string|null, mixed              
         given.                                                                             
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :190   Parameter #1 $value of function collect expects                                    
         Illuminate\Contracts\Support\Arrayable<(int|string),                               
         mixed>|iterable<(int|string), mixed>|null, mixed given.                            
         🪪  argument.type                                                                  
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
  :192   Parameter #1 $time of static method Carbon\Carbon::parse() expects                 
         Carbon\Month|Carbon\WeekDay|DateTimeInterface|float|int|string|null,               
         mixed given.                                                                       
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :193   Parameter #1 $time of static method Carbon\Carbon::parse() expects                 
         Carbon\Month|Carbon\WeekDay|DateTimeInterface|float|int|string|null,               
         mixed given.                                                                       
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :194   Parameter #1 $time of static method Carbon\Carbon::parse() expects                 
         Carbon\Month|Carbon\WeekDay|DateTimeInterface|float|int|string|null,               
         mixed given.                                                                       
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :196   Parameter $category of class Modules\Blog\Datas\ArticleData                        
         constructor expects array<int, array<string, mixed>>, mixed given.                 
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :197   Cannot cast mixed to string.                                                       
         🪪  cast.string                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :199   Cannot cast mixed to float.                                                        
         🪪  cast.double                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :200   Cannot cast mixed to float.                                                        
         🪪  cast.double                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :201   Cannot cast mixed to float.                                                        
         🪪  cast.double                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :202   Cannot cast mixed to int.                                                          
         🪪  cast.int                                                                       
         ✏️  app/Datas/ArticleData.php                                                      
  :203   Cannot cast mixed to int.                                                          
         🪪  cast.int                                                                       
         ✏️  app/Datas/ArticleData.php                                                      
  :204   Cannot cast mixed to int.                                                          
         🪪  cast.int                                                                       
         ✏️  app/Datas/ArticleData.php                                                      
  :205   Parameter $wagers of class Modules\Blog\Datas\ArticleData constructor              
         expects array<int, array<string, mixed>>, mixed given.                             
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :206   Cannot cast mixed to float.                                                        
         🪪  cast.double                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :207   Cannot cast mixed to float.                                                        
         🪪  cast.double                                                                    
         ✏️  app/Datas/ArticleData.php                                                      
  :208   Parameter $outcomes of class Modules\Blog\Datas\ArticleData                        
         constructor expects array<int, array<string, mixed>>, mixed given.                 
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
  :209   Parameter $thumbnail_2x of class Modules\Blog\Datas\ArticleData                    
         constructor expects string|null, mixed given.                                      
         🪪  argument.type                                                                  
         ✏️  app/Datas/ArticleData.php                                                      
 ------ ----------------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/ArticleResource.php                                               
 ------ ----------------------------------------------------------------------------------------- 
  :91    Parameter #1 $options of method                                                          
         Filament\Forms\Components\Select::options() expects                                      
         array<array<string>|string>|Closure|Illuminate\Contracts\Support\Arrayable|string|null,  
         array given.                                                                             
         🪪  argument.type                                                                        
         ✏️  app/Filament/Resources/ArticleResource.php                                           
  :92    Parameter #1 $schema of method                                                           
         Filament\Forms\Components\Select::createOptionForm() expects                             
         array<Filament\Forms\Components\Component>|Closure|null, array given.                    
         🪪  argument.type                                                                        
         ✏️  app/Filament/Resources/ArticleResource.php                                           
  :186   Method Modules\Blog\Filament\Resources\ArticleResource::getPages()                       
         should return array<string,                                                              
         Filament\Resources\Pages\PageRegistration> but returns array<string,                     
         mixed>.                                                                                  
         🪪  return.type                                                                          
         ✏️  app/Filament/Resources/ArticleResource.php                                           
  :187   Call to an undefined static method                                                       
         Modules\Blog\Filament\Resources\ArticleResource\Pages\ListArticles::route().             
         🪪  staticMethod.notFound                                                                
         ✏️  app/Filament/Resources/ArticleResource.php                                           
 ------ ----------------------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/ArticleResource/Pages/ListArticles.php                                  
 ------ ----------------------------------------------------------------------------------------------- 
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
  :81    Parameter #1 $options of method                                                                
         Filament\Tables\Filters\SelectFilter::options() expects                                        
         array<array<string>|string>|class-string|Closure|Illuminate\Contracts\Support\Arrayable|null,  
         array given.                                                                                   
         🪪  argument.type                                                                              
         ✏️  app/Filament/Resources/ArticleResource/Pages/ListArticles.php                              
  :119   Parameter #1 $json_text of method                                                              
         Modules\Blog\Actions\Article\ImportArticlesFromByJsonTextAction::execute()                     
         expects string, mixed given.                                                                   
         🪪  argument.type                                                                              
         ✏️  app/Filament/Resources/ArticleResource/Pages/ListArticles.php                              
 ------ ----------------------------------------------------------------------------------------------- 

 ------ ----------------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/BannerResource.php                                                
 ------ ----------------------------------------------------------------------------------------- 
  :47    Parameter #1 $options of method                                                          
         Filament\Forms\Components\Select::options() expects                                      
         array<array<string>|string>|Closure|Illuminate\Contracts\Support\Arrayable|string|null,  
         array given.                                                                             
         🪪  argument.type                                                                        
         ✏️  app/Filament/Resources/BannerResource.php                                            
  :124   Method Modules\Blog\Filament\Resources\BannerResource::getPages()                        
         should return array<string,                                                              
         Filament\Resources\Pages\PageRegistration> but returns array<string,                     
         mixed>.                                                                                  
         🪪  return.type                                                                          
         ✏️  app/Filament/Resources/BannerResource.php                                            
  :125   Call to an undefined static method                                                       
         Modules\Blog\Filament\Resources\BannerResource\Pages\ListBanners::route().               
         🪪  staticMethod.notFound                                                                
         ✏️  app/Filament/Resources/BannerResource.php                                            
 ------ ----------------------------------------------------------------------------------------- 

 ------ -------------------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/BannerResource/Pages/ListBanners.php                                 
 ------ -------------------------------------------------------------------------------------------- 
  :44    Parameter #1 $json_text of method                                                           
         Modules\Blog\Actions\Banner\ImportBannerFromByJsonTextAction::execute()                     
         expects string, mixed given.                                                                
         🪪  argument.type                                                                           
         ✏️  app/Filament/Resources/BannerResource/Pages/ListBanners.php                             
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
  :34    Method                                                                           
         Modules\Blog\Filament\Resources\CategoryResource::getFormSchema()                
         should return array<int|string, Filament\Forms\Components\Component>             
         but returns array.                                                               
         🪪  return.type                                                                  
         ✏️  app/Filament/Resources/CategoryResource.php                                  
  :78    Method Modules\Blog\Filament\Resources\CategoryResource::getPages()              
         should return array<string,                                                      
         Filament\Resources\Pages\PageRegistration> but returns array<string,             
         mixed>.                                                                          
         🪪  return.type                                                                  
         ✏️  app/Filament/Resources/CategoryResource.php                                  
  :80    Call to an undefined static method                                               
         Modules\Blog\Filament\Resources\CategoryResource\Pages\ListCategories::route().  
         🪪  staticMethod.notFound                                                        
         ✏️  app/Filament/Resources/CategoryResource.php                                  
 ------ --------------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------------------------ 
  Line   app/Filament/Resources/TextWidgetResource.php                                       
 ------ ------------------------------------------------------------------------------------ 
  :82    Method Modules\Blog\Filament\Resources\TextWidgetResource::getPages()               
         should return array<string,                                                         
         Filament\Resources\Pages\PageRegistration> but returns array<string,                
         mixed>.                                                                             
         🪪  return.type                                                                     
         ✏️  app/Filament/Resources/TextWidgetResource.php                                   
  :83    Call to an undefined static method                                                  
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\ListTextWidgets::route().  
         🪪  staticMethod.notFound                                                           
         ✏️  app/Filament/Resources/TextWidgetResource.php                                   
 ------ ------------------------------------------------------------------------------------ 

 ------ --------------------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/TextWidgetResource/Pages/CreateTextWidget.php                         
 ------ --------------------------------------------------------------------------------------------- 
  :16    Method                                                                                       
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\CreateTextWidget::getRedirectUrl()  
         should return string but returns mixed.                                                      
         🪪  return.type                                                                              
         ✏️  app/Filament/Resources/TextWidgetResource/Pages/CreateTextWidget.php                     
 ------ --------------------------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------------------------------- 
  Line   app/Filament/Resources/TextWidgetResource/Pages/EditTextWidget.php                         
 ------ ------------------------------------------------------------------------------------------- 
  :25    Method                                                                                     
         Modules\Blog\Filament\Resources\TextWidgetResource\Pages\EditTextWidget::getRedirectUrl()  
         should return string but returns mixed.                                                    
         🪪  return.type                                                                            
         ✏️  app/Filament/Resources/TextWidgetResource/Pages/EditTextWidget.php                     
 ------ ------------------------------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------ 
  Line   app/Http/Livewire/Profile.php                                     
 ------ ------------------------------------------------------------------ 
  :69    Parameter #1 $state of method                                     
         Filament\Forms\ComponentContainer::fill() expects array<string,   
         mixed>|null, array<mixed, mixed> given.                           
         🪪  argument.type                                                 
         ✏️  app/Http/Livewire/Profile.php                                 
  :100   Parameter #1 $label of method                                     
         Filament\Forms\Components\Component::label() expects              
         Closure|Illuminate\Contracts\Support\Htmlable|string|null, mixed  
         given.                                                            
         🪪  argument.type                                                 
         ✏️  app/Http/Livewire/Profile.php                                 
 ------ ------------------------------------------------------------------ 

 ------ --------------------------------------------------------------------- 
  Line   app/Http/Livewire/Profile/Setting.php                                
 ------ --------------------------------------------------------------------- 
  :48    Parameter #1 $state of method                                        
         Filament\Forms\ComponentContainer::fill() expects array<string,      
         mixed>|null, array given.                                            
         🪪  argument.type                                                    
         ✏️  app/Http/Livewire/Profile/Setting.php                            
  :144   Parameter #1 $value of function bcrypt expects string, mixed given.  
         🪪  argument.type                                                    
         ✏️  app/Http/Livewire/Profile/Setting.php                            
 ------ --------------------------------------------------------------------- 

 ------ ------------------------------------------------------------ 
  Line   app/Models/Article.php                                      
 ------ ------------------------------------------------------------ 
  :347   Cannot cast mixed to string.                                
         🪪  cast.string                                             
         ✏️  app/Models/Article.php                                  
  :402   Anonymous function should return string but returns mixed.  
         🪪  return.type                                             
         ✏️  app/Models/Article.php                                  
  :402   Cannot access offset 'main_image_upload' on mixed.          
         🪪  offsetAccess.nonOffsetAccessible                        
         ✏️  app/Models/Article.php                                  
  :402   Cannot access offset 'main_image_url' on mixed.             
         🪪  offsetAccess.nonOffsetAccessible                        
         ✏️  app/Models/Article.php                                  
 ------ ------------------------------------------------------------ 

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

 ------ --------------------------------------------------------------------- 
  Line   app/View/Composers/ThemeComposer.php                                 
 ------ --------------------------------------------------------------------- 
  :53    Method Modules\Blog\View\Composers\ThemeComposer::getArticlesType()  
         should return Illuminate\Support\Collection but returns mixed.       
         🪪  return.type                                                      
         ✏️  app/View/Composers/ThemeComposer.php                             
  :178   Method Modules\Blog\View\Composers\ThemeComposer::getMethodData()    
         should return array|Illuminate\Contracts\Pagination\Paginator but    
         returns mixed.                                                       
         🪪  return.type                                                      
         ✏️  app/View/Composers/ThemeComposer.php                             
  :333   Cannot call method withCount() on mixed.                             
         🪪  method.nonObject                                                 
         ✏️  app/View/Composers/ThemeComposer.php                             
 ------ --------------------------------------------------------------------- 

 ------ ------------------------------------------------------------------------------- 
  Line   database/Seeders/ArticleSeeder.php                                             
 ------ ------------------------------------------------------------------------------- 
  :34    Parameter #1 $title of static method Illuminate\Support\Str::slug()            
         expects string, mixed given.                                                   
         🪪  argument.type                                                              
         ✏️  database/Seeders/ArticleSeeder.php                                         
  :68    Cannot access offset 'image' on mixed.                                         
         🪪  offsetAccess.nonOffsetAccessible                                           
         ✏️  database/Seeders/ArticleSeeder.php                                         
  :73    Cannot call method create() on mixed.                                          
         🪪  method.nonObject                                                           
         ✏️  database/Seeders/ArticleSeeder.php                                         
  :73    Method Modules\Blog\Database\Seeders\ArticleSeeder::createArticle()            
         should return                                                                  
         Illuminate\Database\Eloquent\Collection&iterable<Modules\Blog\Models\Article>  
         but returns mixed.                                                             
         🪪  return.type                                                                
         ✏️  database/Seeders/ArticleSeeder.php                                         
 ------ ------------------------------------------------------------------------------- 

 ------ --------------------------------------- 
  Line   database/Seeders/SiteSeeder.php        
 ------ --------------------------------------- 
  :15    Cannot call method create() on mixed.  
         🪪  method.nonObject                   
         ✏️  database/Seeders/SiteSeeder.php    
  :20    Cannot call method create() on mixed.  
         🪪  method.nonObject                   
         ✏️  database/Seeders/SiteSeeder.php    
 ------ --------------------------------------- 

 ------ ------------------------------------------------------------------------------- 
  Line   database/seeders/ArticleSeeder.php                                             
 ------ ------------------------------------------------------------------------------- 
  :34    Parameter #1 $title of static method Illuminate\Support\Str::slug()            
         expects string, mixed given.                                                   
         🪪  argument.type                                                              
         ✏️  database/seeders/ArticleSeeder.php                                         
  :68    Cannot access offset 'image' on mixed.                                         
         🪪  offsetAccess.nonOffsetAccessible                                           
         ✏️  database/seeders/ArticleSeeder.php                                         
  :73    Cannot call method create() on mixed.                                          
         🪪  method.nonObject                                                           
         ✏️  database/seeders/ArticleSeeder.php                                         
  :73    Method Modules\Blog\Database\Seeders\ArticleSeeder::createArticle()            
         should return                                                                  
         Illuminate\Database\Eloquent\Collection&iterable<Modules\Blog\Models\Article>  
         but returns mixed.                                                             
         🪪  return.type                                                                
         ✏️  database/seeders/ArticleSeeder.php                                         
 ------ ------------------------------------------------------------------------------- 

 ------ --------------------------------------- 
  Line   database/seeders/SiteSeeder.php        
 ------ --------------------------------------- 
  :15    Cannot call method create() on mixed.  
         🪪  method.nonObject                   
         ✏️  database/seeders/SiteSeeder.php    
  :20    Cannot call method create() on mixed.  
         🪪  method.nonObject                   
         ✏️  database/seeders/SiteSeeder.php    
 ------ --------------------------------------- 

 ------ ------------------------------------------------------------------ 
  Line   http/Livewire/Profile.php                                         
 ------ ------------------------------------------------------------------ 
  :69    Parameter #1 $state of method                                     
         Filament\Forms\ComponentContainer::fill() expects array<string,   
         mixed>|null, array<mixed, mixed> given.                           
         🪪  argument.type                                                 
         ✏️  http/Livewire/Profile.php                                     
  :100   Parameter #1 $label of method                                     
         Filament\Forms\Components\Component::label() expects              
         Closure|Illuminate\Contracts\Support\Htmlable|string|null, mixed  
         given.                                                            
         🪪  argument.type                                                 
         ✏️  http/Livewire/Profile.php                                     
 ------ ------------------------------------------------------------------ 

 ------ --------------------------------------------------------------------- 
  Line   http/Livewire/Profile/Setting.php                                    
 ------ --------------------------------------------------------------------- 
  :48    Parameter #1 $state of method                                        
         Filament\Forms\ComponentContainer::fill() expects array<string,      
         mixed>|null, array given.                                            
         🪪  argument.type                                                    
         ✏️  http/Livewire/Profile/Setting.php                                
  :144   Parameter #1 $value of function bcrypt expects string, mixed given.  
         🪪  argument.type                                                    
         ✏️  http/Livewire/Profile/Setting.php                                
 ------ --------------------------------------------------------------------- 

 [ERROR] Found 341 errors                                                       
```

### Suggerimenti per la risoluzione

#### Errori di tipo 'Cannot call method on mixed'

Questi errori indicano che PHPStan non può determinare il tipo di una variabile e quindi non può verificare se il metodo chiamato esiste. Per risolvere:

1. Aggiungere annotazioni di tipo PHPDoc per chiarire il tipo della variabile
2. Utilizzare asserzioni di tipo come `assert($var instanceof ClassName)`
3. Aggiungere controlli espliciti con `instanceof` prima di chiamare i metodi
4. Per le migrazioni Laravel, tipizzare correttamente il parametro $table come Blueprint

Esempio di correzione per migrazioni:
```php
Schema::create('table_name', function (Blueprint $table) {
    $table->id(); // Ora PHPStan sa che $table è di tipo Blueprint
});
```

#### Errori di tipo 'Parameter expects X, Y given'

Questi errori indicano incompatibilità di tipo nei parametri dei metodi. Per risolvere:

1. Assicurarsi che il tipo passato corrisponda a quello atteso
2. Utilizzare cast espliciti quando appropriato
3. Aggiornare la firma del metodo per accettare il tipo fornito
4. Aggiungere controlli di tipo prima di chiamare il metodo

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
