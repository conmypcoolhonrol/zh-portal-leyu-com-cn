<?php

namespace App\Render;

class LinkCard
{
    private string $url;
    private string $title;
    private string $description;
    private string $keyword;

    public function __construct(
        string $url = 'https://zh-portal-leyu.com.cn',
        string $title = '乐鱼体育',
        string $description = '探索乐鱼体育，享受精彩体育赛事与互动体验',
        string $keyword = '乐鱼体育'
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->keyword = $keyword;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
    }

    public function render(): string
    {
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedDescription = htmlspecialchars($this->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedKeyword = htmlspecialchars($this->keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $html = '<div class="link-card">' . "\n";
        $html .= '    <a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">' . "\n";
        $html .= '        <div class="card-content">' . "\n";
        $html .= '            <h3 class="card-title">' . $escapedTitle . '</h3>' . "\n";
        $html .= '            <p class="card-description">' . $escapedDescription . '</p>' . "\n";
        $html .= '            <span class="card-keyword">' . $escapedKeyword . '</span>' . "\n";
        $html .= '        </div>' . "\n";
        $html .= '    </a>' . "\n";
        $html .= '</div>';

        return $html;
    }

    public function renderWithCustomData(
        string $url,
        string $title,
        string $description,
        string $keyword
    ): string {
        $this->setUrl($url);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setKeyword($keyword);
        return $this->render();
    }

    public static function createDefault(): self
    {
        return new self(
            'https://zh-portal-leyu.com.cn',
            '乐鱼体育',
            '乐鱼体育官方入口，提供丰富的体育赛事资讯',
            '乐鱼体育'
        );
    }

    public static function createFromArray(array $data): self
    {
        $card = new self();
        if (isset($data['url'])) {
            $card->setUrl($data['url']);
        }
        if (isset($data['title'])) {
            $card->setTitle($data['title']);
        }
        if (isset($data['description'])) {
            $card->setDescription($data['description']);
        }
        if (isset($data['keyword'])) {
            $card->setKeyword($data['keyword']);
        }
        return $card;
    }
}